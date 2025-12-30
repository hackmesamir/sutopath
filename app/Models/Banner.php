<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'mobile_image',
        'link',
        'button_text',
        'button_link',
        'position',
        'type',
        'start_date',
        'end_date',
        'is_active',
        'open_in_new_tab',
        'sort_order',
        'alt_text',
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
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'is_active' => 'boolean',
            'open_in_new_tab' => 'boolean',
            'sort_order' => 'integer',
            'settings' => 'array',
        ];
    }

    /**
     * Get the full URL for the banner image.
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        
        return asset('storage/' . $this->image);
    }

    /**
     * Get the full URL for the mobile image.
     *
     * @return string|null
     */
    public function getMobileImageUrlAttribute(): ?string
    {
        if (!$this->mobile_image) {
            return $this->image_url;
        }
        
        if (str_starts_with($this->mobile_image, 'http')) {
            return $this->mobile_image;
        }
        
        return asset('storage/' . $this->mobile_image);
    }

    /**
     * Check if banner is currently active (considering dates).
     *
     * @return bool
     */
    public function isCurrentlyActive(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $now = now();

        if ($this->start_date && $now->lt($this->start_date)) {
            return false;
        }

        if ($this->end_date && $now->gt($this->end_date)) {
            return false;
        }

        return true;
    }

    /**
     * Check if banner is scheduled for future.
     *
     * @return bool
     */
    public function isScheduled(): bool
    {
        return $this->start_date && now()->lt($this->start_date);
    }

    /**
     * Check if banner has expired.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->end_date && now()->gt($this->end_date);
    }

    /**
     * Scope a query to only include active banners.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_date')
                  ->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', now());
            });
    }

    /**
     * Scope a query to filter by position.
     */
    public function scopePosition($query, string $position)
    {
        return $query->where('position', $position);
    }

    /**
     * Scope a query to filter by type.
     */
    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to get homepage slider banners.
     */
    public function scopeHomepageSlider($query)
    {
        return $query->where('position', 'homepage_slider')
            ->active()
            ->ordered();
    }
}
