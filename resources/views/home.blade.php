@extends('layouts.app')

@section('content')
<!-- Categories Section -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Shop by Category</h2>
        
        @if(isset($categories) && $categories->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($categories as $category)
                    <a href="{{ route('shop.index', ['category' => $category->name]) }}" 
                       class="group block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <div class="aspect-square overflow-hidden">
                            @if($category->image)
                                <img src="{{ $category->image }}" 
                                     alt="{{ $category->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 text-4xl">
                                        <i class="fas fa-image"></i>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="p-3 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-[#D4AF37] transition-colors">
                                {{ $category->name }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">No categories available yet.</p>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin/categories') }}" 
                           class="inline-block mt-4 px-4 py-2 bg-[#D4AF37] text-white rounded hover:bg-[#b88a2b]">
                            Add Categories
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</section>

<!-- Featured Products Section -->
@if(isset($featuredProducts) && $featuredProducts->count() > 0)
<section class="py-8">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Featured Products</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <a href="{{ route('product.show', $product->slug) }}" class="block">
                        <div class="aspect-square overflow-hidden bg-gray-100">
                            @if($product->image)
                                <img src="{{ $product->image }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-800 text-sm mb-1">{{ $product->name }}</h3>
                            <p class="text-[#D4AF37] font-bold">₹{{ number_format($product->price, 2) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-6">
            <a href="{{ route('shop.index') }}" 
               class="inline-block px-6 py-3 bg-[#D4AF37] text-white rounded-lg font-semibold hover:bg-[#b88a2b] transition-colors">
                View All Products
            </a>
        </div>
    </div>
</section>
@endif

<!-- Welcome Section -->
<section class="py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Radhe Store</h1>
            <p class="text-gray-600 mb-6">
                Discover our exquisite collection of traditional and modern jewelry. 
                Each piece is crafted with precision and love to make you shine.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('shop.index') }}" 
                   class="inline-block px-6 py-3 bg-[#D4AF37] text-white rounded-lg font-semibold hover:bg-[#b88a2b] transition-colors">
                    Shop Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
