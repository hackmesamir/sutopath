<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
    ];

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @param string $type
     * @param string|null $description
     * @return Setting
     */
    public static function set(string $key, $value, string $type = 'text', ?string $description = null): Setting
    {
        return self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'description' => $description,
            ]
        );
    }

    /**
     * Get all settings as an associative array.
     *
     * @return array
     */
    public static function getAll(): array
    {
        return self::pluck('value', 'key')->toArray();
    }

    /**
     * Get site title.
     *
     * @return string
     */
    public static function siteTitle(): string
    {
        return self::get('site_title', 'Ecomarc Punjabi Shop');
    }

    /**
     * Get site logo.
     *
     * @return string
     */
    public static function siteLogo(): string
    {
        return self::get('site_logo', '/images/logo.png');
    }

    /**
     * Get contact email.
     *
     * @return string
     */
    public static function contactEmail(): string
    {
        return self::get('contact_email', 'info@ecomarcpunjabi.com');
    }

    /**
     * Get contact phone.
     *
     * @return string
     */
    public static function contactPhone(): string
    {
        return self::get('contact_phone', '+91 123 456 7890');
    }

    /**
     * Get contact address.
     *
     * @return string
     */
    public static function contactAddress(): string
    {
        return self::get('contact_address', '123 Punjabi Street, Amritsar, Punjab, India');
    }
}
