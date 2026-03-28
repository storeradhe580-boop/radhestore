<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage with categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch active categories with images
        $categories = Category::active()
            ->whereNotNull('image')
            ->orderBy('name')
            ->get();
        
        // Fetch featured products
        $featuredProducts = Product::where('status', true)
            ->with('category')
            ->latest()
            ->take(8)
            ->get();
        
        // Fetch active sliders
        $sliders = Slider::where('is_published', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('home', compact('categories', 'featuredProducts', 'sliders'));
    }

    /**
     * Show the shipping information page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shippingInfo()
    {
        return view('shipping-info');
    }

    /**
     * Show the FAQ page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Show a dynamic page by slug.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page($slug)
    {
        $page = Page::where('slug', $slug)
                    ->where('is_active', true)
                    ->firstOrFail();
        
        return view('page', compact('page'));
    }
}
