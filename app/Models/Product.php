<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'price',
        'sale_price',
        'cost_price',
        'image',
        'gallery',
        'stock_quantity',
        'stock_status',
        'manage_stock',
        'low_stock_threshold',
        'category_id',
        'subcategory_id',
        'category',
        'subcategory',
        'brand',
        'sizes',
        'colors',
        'attributes',
        'weight',
        'length',
        'width',
        'height',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'is_active',
        'sort_order',
        'views',
        'sales_count',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'cost_price' => 'decimal:2',
            'gallery' => 'array',
            'sizes' => 'array',
            'colors' => 'array',
            'attributes' => 'array',
            'weight' => 'decimal:2',
            'length' => 'decimal:2',
            'width' => 'decimal:2',
            'height' => 'decimal:2',
            'manage_stock' => 'boolean',
            'featured' => 'boolean',
            'is_active' => 'boolean',
            'views' => 'integer',
            'sales_count' => 'integer',
            'stock_quantity' => 'integer',
            'low_stock_threshold' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = \Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = \Str::slug($product->name);
            }
        });
    }

    /**
     * Get the order items for the product.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function categoryRelation(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the subcategory that owns the product.
     */
    public function subcategoryRelation(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    /**
     * Get the product variants.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the sizes available for this product.
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants')
                    ->distinct()
                    ->wherePivot('is_active', true);
    }

    /**
     * Get the colors available for this product.
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_variants')
                    ->distinct()
                    ->wherePivot('is_active', true);
    }

    /**
     * Get available variants in stock.
     */
    public function availableVariants()
    {
        return $this->variants()->where('is_active', true)
            ->where('stock_status', 'in_stock')
            ->where('stock_quantity', '>', 0);
    }

    /**
     * Get the current price (sale price if available, otherwise regular price).
     *
     * @return float
     */
    public function getCurrentPriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    /**
     * Check if product is on sale.
     *
     * @return bool
     */
    public function isOnSale(): bool
    {
        return !is_null($this->sale_price) && $this->sale_price < $this->price;
    }

    /**
     * Get discount percentage.
     *
     * @return float|null
     */
    public function getDiscountPercentage(): ?float
    {
        if (!$this->isOnSale()) {
            return null;
        }

        return round((($this->price - $this->sale_price) / $this->price) * 100, 2);
    }

    /**
     * Check if product is in stock.
     *
     * @return bool
     */
    public function isInStock(): bool
    {
        if (!$this->manage_stock) {
            return $this->stock_status === 'in_stock';
        }

        return $this->stock_quantity > 0 && $this->stock_status === 'in_stock';
    }

    /**
     * Check if product is low in stock.
     *
     * @return bool
     */
    public function isLowStock(): bool
    {
        if (!$this->manage_stock) {
            return false;
        }

        return $this->stock_quantity <= $this->low_stock_threshold && $this->stock_quantity > 0;
    }

    /**
     * Check if product is out of stock.
     *
     * @return bool
     */
    public function isOutOfStock(): bool
    {
        if (!$this->manage_stock) {
            return $this->stock_status === 'out_of_stock';
        }

        return $this->stock_quantity <= 0 || $this->stock_status === 'out_of_stock';
    }

    /**
     * Check if product is published.
     *
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->status === 'published' && $this->is_active;
    }

    /**
     * Increment product views.
     *
     * @return void
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Increment sales count.
     *
     * @param int $quantity
     * @return void
     */
    public function incrementSales(int $quantity = 1): void
    {
        $this->increment('sales_count', $quantity);
        
        if ($this->manage_stock) {
            $this->decrement('stock_quantity', $quantity);
            
            if ($this->stock_quantity <= 0) {
                $this->update(['stock_status' => 'out_of_stock']);
            } elseif ($this->stock_quantity <= $this->low_stock_threshold) {
                $this->update(['stock_status' => 'on_backorder']);
            }
        }
    }

    /**
     * Scope a query to only include published products.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('is_active', true);
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to only include in-stock products.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_status', 'in_stock')
            ->where(function ($q) {
                $q->where('manage_stock', false)
                  ->orWhereColumn('stock_quantity', '>', 0);
            });
    }

    /**
     * Scope a query to only include products on sale.
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('sale_price')
            ->whereColumn('sale_price', '<', 'price');
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $category)
    {
        if (is_numeric($category)) {
            return $query->where('category_id', $category);
        }
        return $query->where('category', $category);
    }

    /**
     * Scope a query to filter by subcategory.
     */
    public function scopeSubcategory($query, $subcategory)
    {
        if (is_numeric($subcategory)) {
            return $query->where('subcategory_id', $subcategory);
        }
        return $query->where('subcategory', $subcategory);
    }

    /**
     * Scope a query to filter by brand.
     */
    public function scopeBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }
}
