@extends('layouts.app')

@section('title', 'Radhe Store - Fashion & Jewelry')

@section('content')
    <!-- HERO SLIDER SECTION -->
    <section class="relative w-screen bg-white overflow-hidden">
        <div class="hero-slider">
            @forelse($banners as $index => $banner)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-2 items-center min-h-[400px] md:min-h-[600px] lg:min-h-[700px]">
                        <!-- Left: Text -->
                        <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 py-8 md:py-0 order-1 text-left">
                            <div class="max-w-lg">
                                <span class="text-[10px] md:text-xs font-medium text-[#D4AF37] uppercase tracking-[0.2em] md:tracking-[0.3em] mb-2 md:mb-4 block">{{ $banner->subtitle ?? 'New Arrivals' }}</span>
                                <h1 class="text-xl sm:text-2xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-3 md:mb-6 leading-[1.1]">{{ $banner->title ?? 'Night Spring Dresses' }}</h1>
                                <a href="{{ route('shop.index') }}" class="inline-flex items-center text-xs md:text-sm font-medium text-[#2b0505] uppercase tracking-wider border-b-2 border-[#2b0505] pb-1 hover:text-[#D4AF37] hover:border-[#D4AF37] transition-colors duration-300">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        <!-- Right: Image -->
                        <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 py-4 md:py-0 order-2">
                            @if($banner->image)
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-[400px] md:h-[600px] lg:h-[700px] object-cover object-top">
                            @else
                                <img src="{{ asset('images/default-slider.jpg') }}" alt="Fashion Model" class="w-full h-[400px] md:h-[600px] lg:h-[700px] object-cover object-top">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback Static Slide when no banners -->
            <div class="hero-slide active" data-slide="0">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-2 items-center min-h-[400px] md:min-h-[600px] lg:min-h-[700px]">
                        <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 py-8 md:py-0 order-1 text-left">
                            <div class="max-w-lg">
                                <span class="text-[10px] md:text-xs font-medium text-[#D4AF37] uppercase tracking-[0.2em] md:tracking-[0.3em] mb-2 md:mb-4 block">New Arrivals</span>
                                <h1 class="text-xl sm:text-2xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-3 md:mb-6 leading-[1.1]">Night Spring Dresses</h1>
                                <a href="{{ route('shop.index') }}" class="inline-flex items-center text-xs md:text-sm font-medium text-[#2b0505] uppercase tracking-wider border-b-2 border-[#2b0505] pb-1 hover:text-[#D4AF37] hover:border-[#D4AF37] transition-colors duration-300">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 py-4 md:py-0 order-2">
                            <img src="{{ asset('images/default-slider.jpg') }}" alt="Fashion Model" class="w-full h-[400px] md:h-[600px] lg:h-[700px] object-cover object-top">
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
            
            <!-- Slider Indicators -->
            <div class="absolute bottom-12 left-6 sm:left-12 lg:left-20 flex items-center gap-4 z-10">
                @if($banners && $banners->count() > 0)
                    @foreach($banners as $index => $banner)
                        <button class="indicator {{ $index === 0 ? 'active' : '' }} text-sm font-medium" data-slide="{{ $index }}" style="color: {{ $index === 0 ? '#2b0505' : 'rgba(43, 5, 5, 0.4)' }};">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </button>
                        @if(!$loop->last)
                        <span class="w-8 h-[1px] bg-[#2b0505]/30"></span>
                        @endif
                    @endforeach
                @else
                    <button class="indicator active text-sm font-medium text-[#2b0505]" data-slide="0">01</button>
                @endif
            </div>
            
            
        </div>
    </section>

    <!-- CATEGORY SLIDER - You Might Like -->
    <section class="w-full bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-[#2b0505]">You Might Like</h2>
            </div>
            
            <!-- Category Slider Container -->
            <div class="relative category-slider-wrapper">
            @if($categories && $categories->count() > 4)
                <!-- Left Arrow -->
                <button class="cat-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white hover:border-[#2b0505] transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                
                <!-- Right Arrow -->
                <button class="cat-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white hover:border-[#2b0505] transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            @endif
                
                <!-- Categories Scroll -->
                <div class="category-scroll overflow-x-auto scrollbar-hide px-8" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="category-track flex gap-8 py-4 {{ $categories && $categories->count() <= 8 ? 'justify-center' : '' }}">
                        @forelse($categories as $category)
                        <a href="{{ route('category.show', $category->slug) }}" class="category-item flex-shrink-0 text-center group cursor-pointer w-28 no-underline">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=200" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @endif
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">{{ $category->name }}</span>
                        </a>
                        @empty
                        <!-- Fallback Static Categories -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=200" alt="Men Shirts" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Shirts</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=200" alt="Men Shoes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Shoes</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&q=80&w=200" alt="Women Dresses" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Dresses</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1519457431-44ccd64a579b?auto=format&fit=crop&q=80&w=200" alt="Kids Tops" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Kids Tops</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1564257631407-4deb1f99d992?auto=format&fit=crop&q=80&w=200" alt="Women Tops" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Tops</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&q=80&w=200" alt="Women Pants" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Pants</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=200" alt="Women Clothes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Clothes</span>
                        </div>
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&q=80&w=200" alt="Men Jeans" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Jeans</span>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED PRODUCTS SECTION -->
    <section class="py-8 bg-[#FCF9F5]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <p class="text-[10px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-2">Featured</p>
                <h2 class="serif text-2xl md:text-3xl text-[#2b0505] mb-2">Masterpieces</h2>
                <p class="text-sm text-black/50">Most loved pieces this week</p>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6">
                @forelse($products->take(8) as $product)
                    <div class="bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 border border-black/5 group flex flex-col">
                        <div class="aspect-square overflow-hidden relative bg-gray-100">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.jpg') }}" loading="lazy" decoding="async" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $product->name }}">
                            
                            @if($product->category)
                                <div class="absolute top-2 left-2">
                                    <span class="bg-white/90 backdrop-blur-sm text-[#2b0505] text-[7px] font-bold uppercase tracking-widest px-1.5 py-0.5 rounded-full shadow-sm">
                                        {{ $product->category->name }}
                                    </span>
                                </div>
                            @endif

                            @if($product->sale_price)
                                <span class="absolute top-2 right-2 bg-[#800000] text-white text-[7px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded shadow-md">SALE</span>
                            @endif

                            <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                @auth
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="bg-white text-[#2b0505] h-8 w-8 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                        <i class="bi bi-cart-plus text-sm"></i>
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="bg-white text-[#2b0505] h-8 w-8 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                    <i class="bi bi-cart-plus text-sm"></i>
                                </a>
                                @endauth
                            </div>
                        </div>
                        <div class="p-2 md:p-3 flex flex-col flex-grow">
                            <h5 class="serif text-[10px] md:text-xs text-[#2b0505] mb-1 font-medium leading-tight line-clamp-2 text-center min-h-[2.5em]">{{ $product->name }}</h5>
                            <div class="flex items-center justify-center gap-1 mb-2 md:mb-3">
                                @if($product->sale_price)
                                    <span class="text-gray-400 text-[10px] md:text-xs line-through">₹{{ number_format($product->regular_price, 0) }}</span>
                                    <span class="text-[#D4AF37] font-bold text-[10px] md:text-xs">₹{{ number_format($product->sale_price, 0) }}</span>
                                @else
                                    <span class="text-[#D4AF37] font-bold text-[10px] md:text-xs">₹{{ number_format($product->regular_price ?? $product->price, 0) }}</span>
                                @endif
                            </div>
                            <div class="grid grid-cols-2 gap-1 md:gap-1.5 mt-auto">
                                @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="contents">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="py-1.5 md:py-2 text-[6px] md:text-[7px] font-bold tracking-[0.15em] md:tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded hover:bg-[#4a0a0a] transition-all">
                                        ADD
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="py-1.5 md:py-2 text-[6px] md:text-[7px] font-bold tracking-[0.15em] md:tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded hover:bg-[#4a0a0a] transition-all flex items-center justify-center">
                                    LOGIN
                                </a>
                                @endauth
                                <a href="{{ route('product.details', $product->slug) }}" class="py-1.5 md:py-2 text-[6px] md:text-[7px] font-bold tracking-[0.15em] md:tracking-[0.2em] uppercase border border-black/10 text-black/60 bg-white rounded hover:bg-black/5 transition-all no-underline flex items-center justify-center">
                                    VIEW
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">No products found.</p>
                    </div>
                @endforelse
            </div>
            
            @if($products->count() > 8)
            <div class="text-center mt-8">
                <a href="{{ route('shop.index') }}" class="inline-flex items-center px-6 py-3 bg-[#2b0505] text-white text-sm font-semibold rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300">
                    View All Products
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Styles -->
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .hero-slide {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .hero-slide.active {
            display: block;
            opacity: 1;
        }
        .indicator.active {
            color: #2b0505;
        }
    </style>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider
            const heroSlides = document.querySelectorAll('.hero-slide');
            const heroIndicators = document.querySelectorAll('.indicator');
            const heroPrev = document.querySelector('.hero-prev');
            const heroNext = document.querySelector('.hero-next');
            if (heroSlides.length > 1) {
                let currentHeroSlide = 0;
                let heroInterval;

                function showHeroSlide(index) {
                    heroSlides.forEach((slide, i) => {
                        slide.classList.remove('active');
                        if(heroIndicators[i]) {
                            heroIndicators[i].classList.remove('active');
                            heroIndicators[i].style.color = i === index ? '#2b0505' : 'rgba(43, 5, 5, 0.4)';
                        }
                    });
                    heroSlides[index].classList.add('active');
                    if(heroIndicators[index]) {
                        heroIndicators[index].classList.add('active');
                    }
                    currentHeroSlide = index;
                }

                function nextHeroSlide() {
                    const next = (currentHeroSlide + 1) % heroSlides.length;
                    showHeroSlide(next);
                }

                function prevHeroSlide() {
                    const prev = (currentHeroSlide - 1 + heroSlides.length) % heroSlides.length;
                    showHeroSlide(prev);
                }

                function startHeroAutoplay() {
                    heroInterval = setInterval(nextHeroSlide, 4000);
                }

                function stopHeroAutoplay() {
                    clearInterval(heroInterval);
                }

                if(heroNext) {
                    heroNext.addEventListener('click', () => {
                        stopHeroAutoplay();
                        nextHeroSlide();
                        startHeroAutoplay();
                    });
                }

                if(heroPrev) {
                    heroPrev.addEventListener('click', () => {
                        stopHeroAutoplay();
                        prevHeroSlide();
                        startHeroAutoplay();
                    });
                }

                heroIndicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        stopHeroAutoplay();
                        showHeroSlide(index);
                        startHeroAutoplay();
                    });
                });

                startHeroAutoplay();
            }

            // Category Slider
            const catScroll = document.querySelector('.category-scroll');
            const catPrev = document.querySelector('.cat-prev');
            const catNext = document.querySelector('.cat-next');
            
            if (catScroll && catPrev && catNext) {
                const scrollAmount = 300;

                catPrev.addEventListener('click', () => {
                    catScroll.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                });

                catNext.addEventListener('click', () => {
                    catScroll.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                });
            }
        });
    </script>
@endsection
