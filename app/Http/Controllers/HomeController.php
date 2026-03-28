<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage with categories, products, and banners.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch active categories with images
        $categories = Category::where('status', true)
            ->whereNotNull('image')
            ->orderBy('name')
            ->get();
        
        // Fetch featured products
        $products = Product::where('status', true)
            ->latest()
            ->take(12)
            ->get();
        
        // Fetch active banners/sliders
        $banners = Slider::where('is_published', true)
            ->orderBy('sort_order')
            ->take(5)
            ->get();
        
        return view('welcome', compact('categories', 'products', 'banners'));
    }
}
