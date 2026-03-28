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
        // TEMPORARY: Fetch all data without status filters (columns don't exist yet)
        $categories = Category::whereNotNull('image')
            ->orderBy('name')
            ->get();
        
        $products = Product::latest()
            ->take(12)
            ->get();
        
        $banners = Slider::orderBy('sort_order')
            ->take(5)
            ->get();
        
        return view('welcome', compact('categories', 'products', 'banners'));
    }
}
