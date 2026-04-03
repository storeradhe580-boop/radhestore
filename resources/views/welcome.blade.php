@extends('layouts.app')

@section('title', 'Radhe Store - Heritage Jewelry')

@section('content')
    <!-- HERO SLIDER SECTION -->
    @if(isset($banners) && $banners->count() > 0)
        @foreach($banners as $banner)
            <section class="w-full bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row items-center min-h-[500px] md:min-h-[600px]">
                        
                        <!-- Left Side: Text Content -->
                        <div class="w-full md:w-1/2 py-10 md:py-0 md:pr-8 lg:pr-16 order-2 md:order-1">
                            <!-- NEW ARRIVALS Tag -->
                            <div class="flex items-center mb-4">
                                <div class="h-[1px] w-8 bg-[#D4AF37] mr-3"></div>
                                <span class="text-[#D4AF37] font-semibold text-xs uppercase tracking-[0.2em]">NEW ARRIVALS</span>
                            </div>
                            
                            <!-- Big Bold Title -->
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-4 leading-tight">
                                {{ $banner->title ?? 'Exclusive Collection' }}
                            </h1>
                            
                            <!-- Description -->
                            <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed max-w-md">
                                {{ $banner->line_1 ?? 'Discover our latest collection of exquisite jewelry pieces crafted with precision and elegance.' }}
                            </p>
                            
                            <!-- Shop Now Link -->
                            <a href="{{ route('shop.index') }}" 
                               class="inline-flex items-center px-8 py-3 bg-[#2b0505] text-white font-semibold text-sm uppercase tracking-wider rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                Shop Now
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                        
                        <!-- Right Side: Hero Image -->
                        <div class="w-full md:w-1/2 order-1 md:order-2">
                            <div class="relative">
                                @if($banner->image)
                                    <img src="{{ url('storage/'.$banner->image) }}" 
                                         alt="{{ $banner->title }}"
                                         class="w-full h-[400px] md:h-[500px] lg:h-[550px] object-cover rounded-lg shadow-2xl">
                                @else
                                    <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&q=80&w=800" 
                                         alt="Jewelry"
                                         class="w-full h-[400px] md:h-[500px] lg:h-[550px] object-cover rounded-lg shadow-2xl">
                                @endif
                                
                                <!-- Decorative Element -->
                                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#D4AF37]/20 rounded-full blur-2xl"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        @endforeach
    @endif

    <!-- ROUND CATEGORY SECTION - You Might Like -->
    @if(isset($categories) && $categories->count() > 0)
        <section class="w-full bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Title -->
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-[#2b0505] mb-2">You Might Like</h2>
                    <div class="w-16 h-1 bg-[#D4AF37] mx-auto rounded"></div>
                </div>
                
                <!-- Horizontal Scroll Container -->
                <div class="flex overflow-x-auto pb-6 gap-6 scrollbar-hide scroll-smooth" style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach($categories as $category)
                        <a href="{{ route('category.show', $category->slug) }}" 
                           class="flex-shrink-0 group text-center no-underline">
                            
                            <!-- Circular Image -->
                            <div class="relative w-28 h-28 md:w-32 md:h-32 mx-auto mb-3">
                                <div class="w-full h-full rounded-full overflow-hidden bg-white border-2 border-gray-100 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300">
                                    @if($category->image)
                                        <img src="{{ $category->image }}" 
                                             alt="{{ $category->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Category Name -->
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300 truncate max-w-28 md:max-w-32 mx-auto">
                                {{ $category->name }}
                            </h3>
                        </a>
                    @endforeach
                </div>
                
            </div>
        </section>
    @endif

    <!-- CSS for hiding scrollbar -->
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection
