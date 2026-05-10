<?php

// Admin helper functions

/**
 * Check if the authenticated user is an admin.
 *
 * @return bool
 */

use App\Models\Setting;

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }
}

/**
 * Format a number as a price.
 *
 * @param float $amount
 * @return string
 */
if (!function_exists('price')) {
    function price($amount)
    {
        return number_format($amount, 2);
    }
}

/**
 * Get the value of a setting by key.
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}