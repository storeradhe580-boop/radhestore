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
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        // Cloudinary stores full URLs, so return as-is
        return $this->image;
    }
    
    /**
     * Get active categories only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
