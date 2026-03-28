<?php

if (!function_exists('getImageUrl')) {
    /**
     * Get the proper image URL based on environment and storage type.
     *
     * @param string|null $imagePath
     * @return string|null
     */
    function getImageUrl($imagePath)
    {
        if (!$imagePath) {
            return null;
        }
        
        // For production, check if it's a Cloudinary URL (starts with http)
        if (app()->environment('production')) {
            if (str_starts_with($imagePath, 'http')) {
                return $imagePath; // Cloudinary URL
            }
            // Fallback for local storage in production (shouldn't happen)
            return asset('storage/' . $imagePath);
        }
        
        // For local development, always use storage path
        return asset('storage/' . $imagePath);
    }
}

if (!function_exists('getCategoryImageUrl')) {
    /**
     * Get category image URL with fallback.
     *
     * @param \App\Models\Category $category
     * @param string|null $fallback
     * @return string
     */
    function getCategoryImageUrl($category, $fallback = null)
    {
        if (!$category || !$category->image) {
            return $fallback ?: 'https://ui-avatars.com/api/?name=Category&background=e5e7eb&color=6b7280';
        }
        
        return getImageUrl($category->image);
    }
}

if (!function_exists('displayImage')) {
    /**
     * Display image with proper URL and fallback.
     *
     * @param string|null $imagePath
     * @param string $alt
     * @param string $class
     * @param string|null $fallback
     * @return string
     */
    function displayImage($imagePath, $alt = '', $class = '', $fallback = null)
    {
        $url = getImageUrl($imagePath) ?: ($fallback ?: 'https://ui-avatars.com/api/?name=' . urlencode($alt));
        
        return sprintf(
            '<img src="%s" alt="%s" class="%s" loading="lazy">',
            htmlspecialchars($url, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($class, ENT_QUOTES, 'UTF-8')
        );
    }
}
