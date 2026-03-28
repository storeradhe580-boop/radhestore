<?php $__env->startSection('title', 'Radhe Store - Heritage Jewelry'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Mobile Hero Slider -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($banners) && $banners->count() > 0): ?>
    <section class="block md:hidden relative w-full bg-white overflow-hidden">
        <div class="swiper mobile-hero-swiper">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="relative w-full min-h-[500px]">
                        <!-- Background Image -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner->image): ?>
                            <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" loading="lazy" decoding="async" 
                                 class="absolute inset-0 w-full h-full object-cover" alt="<?php echo e($banner->title); ?>">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=600" 
                                 class="absolute inset-0 w-full h-full object-cover" alt="Jewelry Product">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <!-- Dark Overlay -->
                        <div class="absolute inset-0 bg-black/20"></div>
                        
                        <!-- Content Overlay -->
                        <div class="relative z-10 flex items-center h-full px-6 py-12">
                            <div class="max-w-md">
                                <!-- NEW ARRIVALS Tag -->
                                <div class="flex items-center mb-4">
                                    <div class="h-[1px] w-12 bg-white mr-4"></div>
                                    <span class="text-white font-serif text-sm tracking-[0.3em] uppercase">NEW ARRIVALS</span>
                                </div>
                                
                                <!-- Main Title -->
                                <h1 class="text-3xl font-serif text-white mb-4 leading-tight font-bold">
                                    <?php echo e($banner->title ?? 'Night Spring Dresses'); ?>

                                </h1>
                                
                                <!-- Shop Now Button -->
                                <a href="<?php echo e(route('shop.index')); ?>" class="inline-flex items-center text-white font-serif text-sm uppercase tracking-[0.2em] hover:text-[#D4AF37] transition-colors duration-300 no-underline group">
                                    Shop Now
                                    <span class="ml-2 border-b border-white group-hover:border-[#D4AF37] transition-colors duration-300"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        
        <!-- Mobile Slider Pagination -->
        <div class="absolute bottom-6 left-6 z-20">
            <div class="flex items-center text-white text-sm font-serif space-x-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="mobile-pagination-number flex items-center transition-colors duration-300 <?php echo e($index === 0 ? 'text-white' : 'text-white/50 hover:text-white'); ?>" 
                            data-slide-to="<?php echo e($index); ?>">
                        <span class="number"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < $banners->count() - 1): ?>
                            <span class="line ml-2 h-[1px] w-6 bg-current transition-all duration-300 <?php echo e($index === 0 ? 'w-8' : 'w-6'); ?>"></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Main Banner Section -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($banners) && $banners->count() > 0): ?>
    <section class="hidden md:block relative w-full bg-white overflow-hidden">
        <div class="swiper main-banner-swiper">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 lg:grid-cols-2 w-full min-h-[500px] lg:min-h-[600px]">
                        <!-- Left Side: Text Content -->
                        <div class="flex items-center justify-center lg:justify-start px-6 sm:px-12 lg:px-20 py-12 lg:py-0">
                            <div class="max-w-lg">
                                <!-- NEW ARRIVALS Tag with Line -->
                                <div class="flex items-center mb-6">
                                    <div class="h-[1px] w-12 bg-[#2b0505] mr-4"></div>
                                    <span class="text-[#2b0505] font-bold text-sm uppercase tracking-[0.2em]">NEW ARRIVALS</span>
                                </div>
                                
                                <!-- Main Title -->
                                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#2b0505] mb-6 leading-tight" style="font-family: 'Playfair Display', serif;">
                                    <?php echo e($banner->title); ?>

                                </h1>
                                
                                <!-- Description -->
                                <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">
                                    <?php echo e($banner->line_2 ?? 'Discover our latest collection of exquisite jewelry pieces crafted with precision and elegance.'); ?>

                                </p>
                                
                                <!-- Shop Now Link with Underline -->
                                <a href="<?php echo e(route('shop.index')); ?>" class="inline-flex items-center text-[#2b0505] font-bold text-sm uppercase tracking-[0.1em] hover:text-[#D4AF37] transition-colors duration-300 no-underline group">
                                    Shop Now
                                    <span class="ml-2 border-b-2 border-[#2b0505] group-hover:border-[#D4AF37] transition-colors duration-300"></span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Right Side: Product Image -->
                        <div class="flex items-center justify-center lg:justify-end px-6 sm:px-12 lg:px-20 py-12 lg:py-0">
                            <div class="w-full max-w-md lg:max-w-lg">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" loading="lazy" decoding="async" 
                                         class="w-full h-auto object-cover rounded-lg shadow-lg" alt="<?php echo e($banner->title); ?>">
                                <?php else: ?>
                                    <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=600" 
                                         class="w-full h-auto object-cover rounded-lg shadow-lg" alt="Jewelry Product">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        
        <!-- Slide Numbers -->
        <div class="absolute bottom-6 left-6 sm:left-12 lg:left-20">
            <div class="flex items-center text-[#2b0505] text-sm font-medium">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="flex items-center">
                        <?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < $banners->count() - 1): ?>
                            <span class="mx-2">—</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($categories) && $categories->count() > 0): ?>
    <section class="py-12 bg-white" id="collection">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-[10px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-2">Our Collections</p>
                <h2 class="serif text-2xl md:text-3xl text-[#2b0505]">Shop by Category</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 md:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('category.show', $category->slug)); ?>" class="group no-underline block text-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full overflow-hidden bg-[#FCF9F5] border border-black/5 mb-3 mx-auto group-hover:shadow-lg transition-all duration-300">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->image): ?>
                            <img src="<?php echo e(asset('storage/' . $category->image)); ?>" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="<?php echo e($category->name); ?>">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-black/20">
                                <i class="bi bi-grid-3x3-gap text-2xl md:text-3xl"></i>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <h6 class="text-[9px] md:text-[10px] font-bold tracking-widest uppercase text-black/80 group-hover:text-[#D4AF37] transition-colors"><?php echo e($category->name); ?></h6>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <section class="py-8 bg-[#FCF9F5]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <p class="text-[10px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-2">Featured</p>
                <h2 class="serif text-2xl md:text-3xl text-[#2b0505] mb-2">Masterpieces</h2>
                <p class="text-sm text-black/50">Most loved traditional pieces this week</p>
            </div>

            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $products->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 border border-black/5 group">
                        <div class="h-48 md:h-56 overflow-hidden relative">
                            <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=1000'); ?>" loading="lazy" decoding="async" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="<?php echo e($product->name); ?>">
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->categoryRel): ?>
                                <div class="absolute top-2 left-2">
                                    <span class="bg-white/90 backdrop-blur-sm text-[#2b0505] text-[7px] font-bold uppercase tracking-widest px-1.5 py-0.5 rounded-full shadow-sm">
                                        <?php echo e($product->categoryRel->name); ?>

                                    </span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price): ?>
                                <span class="absolute top-2 right-2 bg-[#800000] text-white text-[7px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded shadow-md">SALE</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="bg-white text-[#2b0505] h-8 w-8 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                        <i class="bi bi-cart-plus text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="p-3 text-center">
                            <h5 class="serif text-xs text-[#2b0505] mb-1 font-medium leading-tight line-clamp-2 text-center"><?php echo e($product->name); ?></h5>
                            <div class="flex items-center justify-center gap-1 mb-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price): ?>
                                    <span class="text-gray-400 text-xs line-through">₹<?php echo e(number_format($product->regular_price, 0)); ?></span>
                                    <span class="text-[#D4AF37] font-bold text-xs">₹<?php echo e(number_format($product->sale_price, 0)); ?></span>
                                <?php else: ?>
                                    <span class="text-[#D4AF37] font-bold text-xs">₹<?php echo e(number_format($product->regular_price ?? $product->price, 0)); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="grid grid-cols-2 gap-1.5">
                                <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="contents">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="py-1.5 text-[7px] font-bold tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded-md hover:bg-[#4a0a0a] transition-all">
                                        ADD TO CART
                                    </button>
                                </form>
                                <a href="<?php echo e(route('product.details', $product->slug)); ?>" class="py-1.5 text-[7px] font-bold tracking-[0.2em] uppercase border border-black/10 text-black/60 bg-white rounded-md hover:bg-black/5 transition-all no-underline flex items-center justify-center">
                                    DETAILS
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Mobile Hero Slider
        const mobileHeroSwiper = new Swiper('.mobile-hero-swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            effect: 'slide',
            speed: 800,
            allowTouchMove: true,
        });

        // Mobile Custom Pagination
        const mobilePaginationButtons = document.querySelectorAll('.mobile-pagination-number');
        let mobileCurrentIndex = 0;

        function updateMobilePagination(index) {
            mobilePaginationButtons.forEach((button, i) => {
                const number = button.querySelector('.number');
                const line = button.querySelector('.line');
                
                if (i === index) {
                    number.classList.add('text-white');
                    number.classList.remove('text-white/50');
                    if (line) {
                        line.classList.add('w-8');
                        line.classList.remove('w-6');
                    }
                } else {
                    number.classList.remove('text-white');
                    number.classList.add('text-white/50');
                    if (line) {
                        line.classList.remove('w-8');
                        line.classList.add('w-6');
                    }
                }
            });
            mobileCurrentIndex = index;
        }

        // Mobile pagination button clicks
        mobilePaginationButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                mobileHeroSwiper.slideTo(index);
                updateMobilePagination(index);
            });
        });

        // Update mobile pagination on slide change
        mobileHeroSwiper.on('slideChange', () => {
            updateMobilePagination(mobileHeroSwiper.realIndex);
        });

        // Initialize mobile pagination
        updateMobilePagination(0);

        // Initialize Main Banner Slider
        const mainBannerSwiper = new Swiper('.main-banner-swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            effect: 'slide',
            speed: 800,
            allowTouchMove: true,
        });

        const slider = document.getElementById('premium-slider');
        if (!slider) return;

        const slides = slider.querySelectorAll('.slide');
        const pagButtons = slider.querySelectorAll('.pagination-number');
        let currentIndex = 0;
        let intervalId;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('opacity-100', 'z-10', 'active');
                if (i === index) {
                    slide.classList.add('opacity-100', 'z-10', 'active');
                }
            });
            pagButtons.forEach((button, i) => {
                const number = button.querySelector('.number');
                const line = button.querySelector('.line');
                if (i === index) {
                    number.classList.add('text-[#D4AF37]', 'active');
                    number.classList.remove('text-black/30');
                    line.classList.add('w-full');
                } else {
                    number.classList.remove('text-[#D4AF37]', 'active');
                    number.classList.add('text-black/30');
                    line.classList.remove('w-full');
                }
            });
            currentIndex = index;
        }

        function nextSlide() {
            const nextIndex = (currentIndex + 1) % slides.length;
            showSlide(nextIndex);
        }

        function startAutoplay() {
            intervalId = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }

        function stopAutoplay() {
            clearInterval(intervalId);
        }

        pagButtons.forEach(button => {
            button.addEventListener('click', () => {
                const slideIndex = parseInt(button.dataset.slideTo, 10);
                showSlide(slideIndex);
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual navigation
            });
        });

        // Initial setup
        showSlide(0);
        startAutoplay();

        // Initialize Product Slider
        // Removed - now using static grid

        // Add to Cart Function
        window.addToCart = function(productId) {
            fetch("<?php echo e(route('cart.add')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added to bag!');
                    // Update cart count in header if needed
                    const cartCountElement = document.querySelector('.cart-count');
                    if (cartCountElement) {
                        cartCountElement.innerText = data.cart_count;
                    }
                }
            });
        }

        // Product Swiper Initialization
        const productSwiper = new Swiper('.product-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination-custom',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                },
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\welcome.blade.php ENDPATH**/ ?>