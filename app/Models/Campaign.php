<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Product;

class Campaign extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'discount_type',
        'discount_value',
        'max_discount_amount',
        'min_order_amount',
        'applicable_to',
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'start_date',
        'end_date',
        'is_active',
        'is_first_order_only',
        'is_new_user_only',
        'terms_conditions',
        'banner_image',
        'settings',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'discount_value' => 'decimal:2',
            'max_discount_amount' => 'decimal:2',
            'min_order_amount' => 'decimal:2',
            'usage_limit' => 'integer',
            'usage_limit_per_user' => 'integer',
            'used_count' => 'integer',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'is_active' => 'boolean',
            'is_first_order_only' => 'boolean',
            'is_new_user_only' => 'boolean',
            'settings' => 'array',
        ];
    }

    /**
     * Get the products that belong to this campaign.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'campaign_product')
            ->withTimestamps();
    }


    /**
     * Check if campaign is currently active (considering dates and status).
     *
     * @return bool
     */
    public function isCurrentlyActive(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $now = now();

        if ($now->lt($this->start_date)) {
            return false;
        }

        if ($now->gt($this->end_date)) {
            return false;
        }

        // Check usage limit
        if ($this->usage_limit && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    /**
     * Check if campaign is valid for a specific order amount.
     *
     * @param float $orderAmount
     * @return bool
     */
    public function isValidForOrderAmount(float $orderAmount): bool
    {
        return $orderAmount >= $this->min_order_amount;
    }

    /**
     * Check if campaign is valid for a specific user.
     *
     * @param int|null $userId
     * @param bool $isNewUser
     * @param bool $isFirstOrder
     * @return bool
     */
    public function isValidForUser(?int $userId = null, bool $isNewUser = false, bool $isFirstOrder = false): bool
    {
        if ($this->is_new_user_only && !$isNewUser) {
            return false;
        }

        if ($this->is_first_order_only && !$isFirstOrder) {
            return false;
        }

        // Check per-user usage limit if user is provided
        if ($userId && $this->usage_limit_per_user) {
            // You would need to track per-user usage in a separate table
            // For now, we'll assume it's valid
        }

        return true;
    }

    /**
     * Check if campaign applies to a specific product.
     *
     * @param int $productId
     * @return bool
     */
    public function appliesToProduct(int $productId): bool
    {
        if ($this->applicable_to === 'all_products') {
            return true;
        }

        if ($this->applicable_to === 'specific_products') {
            return $this->products()->where('products.id', $productId)->exists();
        }


        return false;
    }

    /**
     * Calculate discount amount for a given order amount.
     *
     * @param float $orderAmount
     * @return float
     */
    public function calculateDiscount(float $orderAmount): float
    {
        if (!$this->isValidForOrderAmount($orderAmount)) {
            return 0;
        }

        $discount = 0;

        switch ($this->discount_type) {
            case 'percentage':
                $discount = ($orderAmount * $this->discount_value) / 100;
                if ($this->max_discount_amount && $discount > $this->max_discount_amount) {
                    $discount = $this->max_discount_amount;
                }
                break;

            case 'fixed_amount':
                $discount = min($this->discount_value, $orderAmount);
                break;

            case 'free_shipping':
                // This would be handled separately in shipping calculation
                $discount = 0;
                break;

            case 'buy_x_get_y':
                // This would require additional logic based on settings
                $discount = 0;
                break;
        }

        return round($discount, 2);
    }

    /**
     * Increment usage count.
     *
     * @return void
     */
    public function incrementUsage(): void
    {
        $this->increment('used_count');
    }

    /**
     * Get banner image URL.
     *
     * @return string|null
     */
    public function getBannerImageUrlAttribute(): ?string
    {
        if (!$this->banner_image) {
            return null;
        }

        if (str_starts_with($this->banner_image, 'http')) {
            return $this->banner_image;
        }

        return asset('storage/' . $this->banner_image);
    }

    /**
     * Scope a query to only include active campaigns.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where(function ($q) {
                $q->whereNull('usage_limit')
                  ->orWhereColumn('used_count', '<', 'usage_limit');
            });
    }

    /**
     * Scope a query to filter by discount type.
     */
    public function scopeDiscountType($query, string $type)
    {
        return $query->where('discount_type', $type);
    }

    /**
     * Scope a query to get campaigns valid for order amount.
     */
    public function scopeValidForAmount($query, float $amount)
    {
        return $query->where('min_order_amount', '<=', $amount);
    }

    /**
     * Scope a query to order by start date.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('start_date', 'desc')->orderBy('created_at', 'desc');
    }
}
