<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'status'];
    
    protected $casts = [
        'status' => 'boolean',
    ];
    
    protected $attributes = [
        'status' => true, // Default to active
    ];
}
