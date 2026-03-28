<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Show the application homepage with categories, products, and banners.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch categories (status column should exist, but be safe)
        $categories = $this->getCategories();
        
        // Fetch products (check if status column exists)
        $products = $this->getProducts();
        
        // Fetch sliders (check if is_published and sort_order exist)
        $banners = $this->getSliders();
        
        return view('welcome', compact('categories', 'products', 'banners'));
    }
    
    /**
     * Get categories with fallback
     */
    private function getCategories()
    {
        $query = Category::whereNotNull('image');
        
        // Only filter by status if column exists
        if (Schema::hasColumn('categories', 'status')) {
            $query->where('status', true);
        }
        
        return $query->orderBy('name')->get();
    }
    
    /**
     * Get products with fallback for missing status column
     */
    private function getProducts()
    {
        $query = Product::query();
        
        // Only filter by status if column exists
        if (Schema::hasColumn('products', 'status')) {
            $query->where('status', true);
        }
        
        return $query->latest()->take(12)->get();
    }
    
    /**
     * Get sliders with fallback for missing columns
     */
    private function getSliders()
    {
        $query = Slider::query();
        
        // Only filter by is_published if column exists
        if (Schema::hasColumn('sliders', 'is_published')) {
            $query->where('is_published', true);
        }
        
        // Only order by sort_order if column exists
        if (Schema::hasColumn('sliders', 'sort_order')) {
            $query->orderBy('sort_order');
        } else {
            $query->latest();
        }
        
        return $query->take(5)->get();
    }
}
