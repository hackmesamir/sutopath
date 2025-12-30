<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'shipping_method',
        'state',
        'city',
        'pincode',
        'min_weight',
        'max_weight',
        'min_order_value',
        'max_order_value',
        'charge',
        'free_shipping_threshold',
        'estimated_days',
        'description',
        'is_active',
        'sort_order',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'min_weight' => 'decimal:2',
            'max_weight' => 'decimal:2',
            'min_order_value' => 'decimal:2',
            'max_order_value' => 'decimal:2',
            'charge' => 'decimal:2',
            'free_shipping_threshold' => 'decimal:2',
            'estimated_days' => 'integer',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Calculate shipping charge for an order.
     *
     * @param float $orderValue
     * @param float $weight
     * @param string|null $state
     * @param string|null $city
     * @param string|null $pincode
     * @return float|null
     */
    public static function calculateCharge(
        float $orderValue,
        float $weight = 0,
        ?string $state = null,
        ?string $city = null,
        ?string $pincode = null
    ): ?float {
        // Check for free shipping threshold
        $freeShippingCharge = static::where('is_active', true)
            ->whereNotNull('free_shipping_threshold')
            ->where('free_shipping_threshold', '<=', $orderValue)
            ->where(function ($query) use ($state, $city, $pincode) {
                static::applyLocationFilters($query, $state, $city, $pincode);
            })
            ->first();

        if ($freeShippingCharge) {
            return 0;
        }

        // Find matching shipping charge
        $shippingCharge = static::where('is_active', true)
            ->where(function ($query) use ($state, $city, $pincode) {
                static::applyLocationFilters($query, $state, $city, $pincode);
            })
            ->where(function ($query) use ($orderValue) {
                $query->whereNull('min_order_value')
                      ->orWhere('min_order_value', '<=', $orderValue);
            })
            ->where(function ($query) use ($orderValue) {
                $query->whereNull('max_order_value')
                      ->orWhere('max_order_value', '>=', $orderValue);
            })
            ->where(function ($query) use ($weight) {
                $query->whereNull('min_weight')
                      ->orWhere('min_weight', '<=', $weight);
            })
            ->where(function ($query) use ($weight) {
                $query->whereNull('max_weight')
                      ->orWhere('max_weight', '>=', $weight);
            })
            ->orderBy('sort_order')
            ->orderBy('charge')
            ->first();

        return $shippingCharge ? $shippingCharge->charge : null;
    }

    /**
     * Apply location filters to query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $state
     * @param string|null $city
     * @param string|null $pincode
     * @return void
     */
    public static function applyLocationFilters($query, ?string $state, ?string $city, ?string $pincode): void
    {
        $query->where(function ($q) use ($state, $city, $pincode) {
            // Match specific location or general (null)
            $q->where(function ($subQ) use ($state) {
                $subQ->whereNull('state')->orWhere('state', $state);
            })
            ->where(function ($subQ) use ($city) {
                $subQ->whereNull('city')->orWhere('city', $city);
            })
            ->where(function ($subQ) use ($pincode) {
                $subQ->whereNull('pincode')->orWhere('pincode', $pincode);
            });
        });
    }

    /**
     * Check if shipping is free for order value.
     *
     * @param float $orderValue
     * @return bool
     */
    public function isFreeShipping(float $orderValue): bool
    {
        return $this->free_shipping_threshold && $orderValue >= $this->free_shipping_threshold;
    }

    /**
     * Check if charge applies to location.
     *
     * @param string|null $state
     * @param string|null $city
     * @param string|null $pincode
     * @return bool
     */
    public function appliesToLocation(?string $state = null, ?string $city = null, ?string $pincode = null): bool
    {
        if ($this->state && $this->state !== $state) {
            return false;
        }
        
        if ($this->city && $this->city !== $city) {
            return false;
        }
        
        if ($this->pincode && $this->pincode !== $pincode) {
            return false;
        }
        
        return true;
    }

    /**
     * Check if charge applies to order value.
     *
     * @param float $orderValue
     * @return bool
     */
    public function appliesToOrderValue(float $orderValue): bool
    {
        if ($this->min_order_value && $orderValue < $this->min_order_value) {
            return false;
        }
        
        if ($this->max_order_value && $orderValue > $this->max_order_value) {
            return false;
        }
        
        return true;
    }

    /**
     * Check if charge applies to weight.
     *
     * @param float $weight
     * @return bool
     */
    public function appliesToWeight(float $weight): bool
    {
        if ($this->min_weight && $weight < $this->min_weight) {
            return false;
        }
        
        if ($this->max_weight && $weight > $this->max_weight) {
            return false;
        }
        
        return true;
    }

    /**
     * Scope a query to only include active shipping charges.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by shipping method.
     */
    public function scopeMethod($query, string $method)
    {
        return $query->where('shipping_method', $method);
    }

    /**
     * Scope a query to filter by state.
     */
    public function scopeForState($query, string $state)
    {
        return $query->where(function ($q) use ($state) {
            $q->whereNull('state')->orWhere('state', $state);
        });
    }
}
