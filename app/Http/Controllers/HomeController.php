<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // DEBUG: Check if categories exist
        $categories = Category::all();
        
        // Uncomment the line below to debug (will show data and stop)
        // dd($categories);
        
        return view('home', compact('categories'));
    }
}
