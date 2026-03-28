<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug', 
        'image',
        'status'
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    /**
     * The attributes that should have default values.
     *
     * @var array
     */
    protected $attributes = [
        'status' => true, // Default to active
    ];
    
    /**
     * Get the image URL attribute.
     *
     * @param string $value
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        // For production, use Cloudinary URL (stored as full URL)
        if (app()->environment('production')) {
            return $this->image; // Cloudinary stores full URL
        }
        
        // For local development, use storage path
        return asset('storage/' . $this->image);
    }
    
    /**
     * Get the image path for storage operations.
     *
     * @return string|null
     */
    public function getImagePathAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        // For production, Cloudinary URL is the path
        if (app()->environment('production')) {
            return $this->image;
        }
        
        // For local, return relative path
        return $this->image;
    }
}
