@extends('layouts.app')

@section('title', 'Radhe Store - Fashion & Jewelry')

@section('content')
    <!-- HERO SLIDER SECTION -->
    <section class="relative w-screen bg-white overflow-hidden">
        <div class="hero-slider">
            
            <!-- Slide 1 -->
            <div class="hero-slide active" data-slide="0">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center min-h-[600px] lg:min-h-[700px]">
                    <!-- Left: Text -->
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="text-xs font-medium text-[#D4AF37] uppercase tracking-[0.3em] mb-4 block">New Arrivals</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-[1.1]">Night Spring Dresses</h1>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-[#2b0505] uppercase tracking-wider border-b-2 border-[#2b0505] pb-1 hover:text-[#D4AF37] hover:border-[#D4AF37] transition-colors duration-300">
                                Shop Now
                            </a>
                        </div>
                    </div>
                    <!-- Right: Image -->
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=800" alt="Fashion Model" class="w-full h-[600px] lg:h-[700px] object-cover object-top">
                    </div>
                </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="hero-slide" data-slide="1">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center min-h-[600px] lg:min-h-[700px]">
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="text-xs font-medium text-[#D4AF37] uppercase tracking-[0.3em] mb-4 block">Trending</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-[1.1]">Summer Collection</h1>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-[#2b0505] uppercase tracking-wider border-b-2 border-[#2b0505] pb-1 hover:text-[#D4AF37] hover:border-[#D4AF37] transition-colors duration-300">
                                Shop Now
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&q=80&w=800" alt="Fashion Model" class="w-full h-[600px] lg:h-[700px] object-cover object-top">
                    </div>
                </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="hero-slide" data-slide="2">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center min-h-[600px] lg:min-h-[700px]">
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="text-xs font-medium text-[#D4AF37] uppercase tracking-[0.3em] mb-4 block">Exclusive</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-[1.1]">Premium Jewelry</h1>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-[#2b0505] uppercase tracking-wider border-b-2 border-[#2b0505] pb-1 hover:text-[#D4AF37] hover:border-[#D4AF37] transition-colors duration-300">
                                Shop Now
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?auto=format&fit=crop&q=80&w=800" alt="Fashion Model" class="w-full h-[600px] lg:h-[700px] object-cover object-top">
                    </div>
                </div>
                </div>
            </div>
            
            <!-- Slider Indicators -->
            <div class="absolute bottom-12 left-6 sm:left-12 lg:left-20 flex items-center gap-4 z-10">
                <button class="indicator active text-sm font-medium text-[#2b0505]" data-slide="0">01</button>
                <span class="w-8 h-[1px] bg-[#2b0505]/30"></span>
                <button class="indicator text-sm font-medium text-[#2b0505]/40 hover:text-[#2b0505] transition-colors" data-slide="1">02</button>
                <span class="w-8 h-[1px] bg-[#2b0505]/30"></span>
                <button class="indicator text-sm font-medium text-[#2b0505]/40 hover:text-[#2b0505] transition-colors" data-slide="2">03</button>
            </div>
            
            <!-- Navigation Arrows -->
            <button class="hero-prev absolute left-4 md:left-8 top-1/2 -translate-y-1/2 w-12 h-12 border border-[#2b0505]/20 flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white transition-all duration-300 z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="hero-next absolute right-4 md:right-8 top-1/2 -translate-y-1/2 w-12 h-12 border border-[#2b0505]/20 flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white transition-all duration-300 z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/></svg>
            </button>
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
                <!-- Left Arrow -->
                <button class="cat-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white hover:border-[#2b0505] transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                
                <!-- Right Arrow -->
                <button class="cat-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-md flex items-center justify-center text-[#2b0505] hover:bg-[#2b0505] hover:text-white hover:border-[#2b0505] transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
                
                <!-- Categories Scroll -->
                <div class="category-scroll overflow-x-auto scrollbar-hide px-8" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="category-track flex gap-8 py-4 justify-center">
                        
                        <!-- Men Shirts -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=200" alt="Men Shirts" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Shirts</span>
                        </div>
                        
                        <!-- Men Shoes -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=200" alt="Men Shoes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Shoes</span>
                        </div>
                        
                        <!-- Women Dresses -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&q=80&w=200" alt="Women Dresses" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Dresses</span>
                        </div>
                        
                        <!-- Kids Tops -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1519457431-44ccd64a579b?auto=format&fit=crop&q=80&w=200" alt="Kids Tops" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Kids Tops</span>
                        </div>
                        
                        <!-- Women Tops -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1564257631407-4deb1f99d992?auto=format&fit=crop&q=80&w=200" alt="Women Tops" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Tops</span>
                        </div>
                        
                        <!-- Women Pants -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&q=80&w=200" alt="Women Pants" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Pants</span>
                        </div>
                        
                        <!-- Women Clothes -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=200" alt="Women Clothes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Women Clothes</span>
                        </div>
                        
                        <!-- Men Jeans -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer w-28">
                            <div class="w-28 h-28 rounded-full overflow-hidden bg-gray-50 mb-3 border border-gray-100 group-hover:border-[#D4AF37] transition-all duration-300">
                                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&q=80&w=200" alt="Men Jeans" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="text-xs font-medium text-gray-700 group-hover:text-[#D4AF37] transition-colors">Men Jeans</span>
                        </div>
                        
                    </div>
                </div>
            </div>
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
            let currentHeroSlide = 0;
            let heroInterval;

            function showHeroSlide(index) {
                heroSlides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    heroIndicators[i].classList.remove('active');
                    heroIndicators[i].style.color = i === index ? '#2b0505' : 'rgba(43, 5, 5, 0.4)';
                });
                heroSlides[index].classList.add('active');
                heroIndicators[index].classList.add('active');
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

            heroNext.addEventListener('click', () => {
                stopHeroAutoplay();
                nextHeroSlide();
                startHeroAutoplay();
            });

            heroPrev.addEventListener('click', () => {
                stopHeroAutoplay();
                prevHeroSlide();
                startHeroAutoplay();
            });

            heroIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    stopHeroAutoplay();
                    showHeroSlide(index);
                    startHeroAutoplay();
                });
            });

            startHeroAutoplay();

            // Category Slider
            const catScroll = document.querySelector('.category-scroll');
            const catPrev = document.querySelector('.cat-prev');
            const catNext = document.querySelector('.cat-next');
            const scrollAmount = 300;

            catPrev.addEventListener('click', () => {
                catScroll.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });

            catNext.addEventListener('click', () => {
                catScroll.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        });
    </script>
@endsection
