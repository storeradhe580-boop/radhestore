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
        // Fetch categories
        $categories = $this->getCategories();
        
        // Fetch products
        $products = $this->getProducts();
        
        // Fetch sliders (use same name as Blade)
        $banners = Slider::latest()->get();
        
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
     * Get sliders - simple query without status filter
     */
    private function getSliders()
    {
        return Slider::latest()->take(5)->get();
    }
}
