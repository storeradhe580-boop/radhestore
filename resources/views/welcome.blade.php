@extends('layouts.app')

@section('title', 'Radhe Store - Heritage Jewelry')

@section('content')
    <!-- MODERN HERO SLIDER -->
    <section class="relative w-full bg-white overflow-hidden">
        <div class="hero-slider-container relative">
            
            <!-- Slide 1 -->
            <div class="hero-slide active" data-index="0">
                <div class="flex flex-col md:flex-row items-center min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                    <!-- Left: Text Content -->
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="inline-block text-[#D4AF37] font-semibold text-xs uppercase tracking-[0.2em] mb-4">New Arrivals</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-tight">Night Spring Dresses</h1>
                            <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">Discover our latest collection of exquisite jewelry pieces crafted with precision and elegance.</p>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-[#2b0505] text-white font-semibold text-sm uppercase tracking-wider rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300 shadow-lg hover:shadow-xl">
                                Shop Now
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    <!-- Right: Image -->
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&q=80&w=800" alt="Fashion" class="w-full h-[350px] md:h-[450px] lg:h-[550px] object-cover rounded-lg shadow-2xl">
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#D4AF37]/20 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="hero-slide" data-index="1">
                <div class="flex flex-col md:flex-row items-center min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="inline-block text-[#D4AF37] font-semibold text-xs uppercase tracking-[0.2em] mb-4">Trending Now</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-tight">Summer Collection</h1>
                            <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">Elevate your style with our premium selection of designer accessories and jewelry.</p>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-[#2b0505] text-white font-semibold text-sm uppercase tracking-wider rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300 shadow-lg hover:shadow-xl">
                                Shop Now
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&q=80&w=800" alt="Fashion" class="w-full h-[350px] md:h-[450px] lg:h-[550px] object-cover rounded-lg shadow-2xl">
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#D4AF37]/20 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="hero-slide" data-index="2">
                <div class="flex flex-col md:flex-row items-center min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-12 md:py-0 order-2 md:order-1">
                        <div class="max-w-lg">
                            <span class="inline-block text-[#D4AF37] font-semibold text-xs uppercase tracking-[0.2em] mb-4">Exclusive</span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2b0505] mb-6 leading-tight">Premium Jewelry</h1>
                            <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">Handcrafted pieces that define luxury and sophistication for every occasion.</p>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-[#2b0505] text-white font-semibold text-sm uppercase tracking-wider rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300 shadow-lg hover:shadow-xl">
                                Shop Now
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-6 sm:px-12 lg:px-20 py-8 md:py-0 order-1 md:order-2">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?auto=format&fit=crop&q=80&w=800" alt="Fashion" class="w-full h-[350px] md:h-[450px] lg:h-[550px] object-cover rounded-lg shadow-2xl">
                            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#D4AF37]/20 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Arrows -->
            <button class="hero-prev absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center text-[#2b0505] hover:bg-[#D4AF37] hover:text-white transition-all duration-300 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="hero-next absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center text-[#2b0505] hover:bg-[#D4AF37] hover:text-white transition-all duration-300 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
            
            <!-- Dots Indicator -->
            <div class="hero-dots absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
                <button class="dot active w-3 h-3 rounded-full bg-[#2b0505] transition-all duration-300" data-index="0"></button>
                <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300" data-index="1"></button>
                <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300" data-index="2"></button>
            </div>
        </div>
    </section>

    <style>
        .hero-slide {
            display: none;
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
        }
        .hero-slide.active {
            display: block;
            opacity: 1;
        }
        .dot.active {
            width: 2rem;
            border-radius: 9999px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.querySelector('.hero-prev');
            const nextBtn = document.querySelector('.hero-next');
            let currentSlide = 0;
            let slideInterval;
            const totalSlides = slides.length;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    dots[i].classList.remove('active');
                    dots[i].style.width = '0.75rem';
                    dots[i].style.borderRadius = '9999px';
                });
                
                slides[index].classList.add('active');
                dots[index].classList.add('active');
                dots[index].style.width = '2rem';
                dots[index].style.borderRadius = '9999px';
                currentSlide = index;
            }

            function nextSlide() {
                const next = (currentSlide + 1) % totalSlides;
                showSlide(next);
            }

            function prevSlide() {
                const prev = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(prev);
            }

            function startAutoSlide() {
                slideInterval = setInterval(nextSlide, 3000);
            }

            function stopAutoSlide() {
                clearInterval(slideInterval);
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });

            prevBtn.addEventListener('click', () => {
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    stopAutoSlide();
                    showSlide(index);
                    startAutoSlide();
                });
            });

            // Start auto slide
            startAutoSlide();
        });
    </script>

    <!-- SHOP BY CATEGORY SECTION -->
    <section class="w-full bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-[#2b0505] mb-2">Shop by Category</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mx-auto rounded"></div>
            </div>

            <!-- Category Slider Container -->
            <div class="relative">
                <!-- Left Arrow -->
                <button class="category-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-[#2b0505] hover:bg-[#D4AF37] hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <!-- Right Arrow -->
                <button class="category-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-[#2b0505] hover:bg-[#D4AF37] hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                <!-- Categories Scroll Container -->
                <div class="category-scroll-container overflow-x-auto scrollbar-hide px-8" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="category-items flex gap-6 py-4">
                        
                        <!-- Women Clothes -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=200" alt="Women Clothes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Women Clothes</h3>
                        </div>

                        <!-- Men Jeans -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&q=80&w=200" alt="Men Jeans" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Men Jeans</h3>
                        </div>

                        <!-- Shirts -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=200" alt="Shirts" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Shirts</h3>
                        </div>

                        <!-- Shoes -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=200" alt="Shoes" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Shoes</h3>
                        </div>

                        <!-- Dresses -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&q=80&w=200" alt="Dresses" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Dresses</h3>
                        </div>

                        <!-- Kids -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1519457431-44ccd64a579b?auto=format&fit=crop&q=80&w=200" alt="Kids" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Kids</h3>
                        </div>

                        <!-- Tops -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1564257631407-4deb1f99d992?auto=format&fit=crop&q=80&w=200" alt="Tops" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Tops</h3>
                        </div>

                        <!-- Pants -->
                        <div class="category-item flex-shrink-0 text-center group cursor-pointer">
                            <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden bg-gray-100 border-2 border-gray-200 shadow-md group-hover:shadow-xl group-hover:border-[#D4AF37] transition-all duration-300 mx-auto mb-3">
                                <img src="https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&q=80&w=200" alt="Pants" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-sm font-medium text-gray-800 group-hover:text-[#D4AF37] transition-colors duration-300">Pants</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Slider JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.querySelector('.category-scroll-container');
            const prevBtn = document.querySelector('.category-prev');
            const nextBtn = document.querySelector('.category-next');
            const scrollAmount = 200;

            prevBtn.addEventListener('click', function() {
                scrollContainer.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', function() {
                scrollContainer.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
