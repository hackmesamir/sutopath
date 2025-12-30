<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'price',
        'sale_price',
        'stock_quantity',
        'stock_status',
        'sku',
        'image',
        'attributes',
        'sort_order',
        'is_active',
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
            'stock_quantity' => 'integer',
            'attributes' => 'array',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the product that owns the variant.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the size of the variant.
     */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * Get the color of the variant.
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get the current price (sale price if available, otherwise variant price or product price).
     *
     * @return float
     */
    public function getCurrentPriceAttribute(): float
    {
        if ($this->sale_price) {
            return $this->sale_price;
        }
        
        if ($this->price) {
            return $this->price;
        }
        
        return $this->product->current_price;
    }

    /**
     * Check if variant is in stock.
     *
     * @return bool
     */
    public function isInStock(): bool
    {
        return $this->stock_quantity > 0 && $this->stock_status === 'in_stock';
    }

    /**
     * Check if variant is out of stock.
     *
     * @return bool
     */
    public function isOutOfStock(): bool
    {
        return $this->stock_quantity <= 0 || $this->stock_status === 'out_of_stock';
    }

    /**
     * Get variant display name.
     *
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        $parts = [];
        
        if ($this->size) {
            $parts[] = $this->size->name;
        }
        
        if ($this->color) {
            $parts[] = $this->color->name;
        }
        
        return !empty($parts) ? implode(' - ', $parts) : 'Default';
    }

    /**
     * Scope a query to only include active variants.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include in-stock variants.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_status', 'in_stock')
            ->where('stock_quantity', '>', 0);
    }
}
