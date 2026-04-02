@extends('layouts.app')

@section('content')

@if($banners && $banners->count() > 0)
<div class="w-full mb-10">
    @foreach($banners as $banner)
        <div class="mb-6">
            
            <!-- Title -->
            <h2 class="text-xl font-bold mb-2 text-center">
                {{ $banner->title }}
            </h2>

            <!-- Image -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/'.$banner->image) }}" 
                     alt="{{ $banner->title }}"
                     class="w-full max-w-3xl h-64 object-cover rounded-lg shadow">
            </div>

        </div>
    @endforeach
</div>
@endif
<!-- 🔥 SLIDER END -->

<div class="container mx-auto px-4 py-8">
    
    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Welcome to Radhe Store</h1>
    
    <!-- Categories Section -->
    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Shop by Category</h2>
    
    @if($categories && $categories->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <!-- Category Image - Using direct Cloudinary URL -->
                    @if($category->image)
                        <img src="{{ $category->image }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                    
                    <!-- Category Name -->
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $category->name }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 bg-gray-50 rounded-lg">
            <p class="text-gray-500">No categories found. Please add categories in the admin panel.</p>
        </div>
    @endif
    
</div>
@endsection
