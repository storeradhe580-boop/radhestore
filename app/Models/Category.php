<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'slug', 'image', 'status'];
    
    protected $casts = [
        'status' => 'boolean',
    ];
    
    protected $attributes = [
        'status' => true, // Default to active
    ];
}
