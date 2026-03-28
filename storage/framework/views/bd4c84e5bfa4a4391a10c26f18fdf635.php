<?php $__env->startSection('title', 'Shop - Radhe Store'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
        <div class="flex flex-col gap-12">
            
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
                <div class="max-w-2xl">
                    <p class="text-[11px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-3">Radhe Collections</p>
                    <h1 class="serif text-4xl sm:text-5xl text-[#2b0505]">
                        <?php echo e(isset($category) ? $category->name : 'Shop All Jewelry'); ?>

                    </h1>
                    <p class="mt-4 text-sm text-black/60 leading-relaxed">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($category)): ?>
                            Discover our exquisite range of <?php echo e($category->name); ?> — each piece is a masterpiece of heritage craftsmanship and royal elegance.
                        <?php else: ?>
                            Explore our full collection of heritage-inspired jewelry. From majestic bridal sets to delicate statement pieces, find the perfect reflection of your legacy.
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                </div>

                <form class="flex flex-col sm:flex-row gap-4 items-stretch sm:items-center" method="GET" action="<?php echo e(route('shop.index')); ?>">
                    <div class="relative group">
                        <input
                            type="search"
                            name="q"
                            value="<?php echo e($search ?? request('q')); ?>"
                            placeholder="Search products..."
                            class="w-full sm:w-72 rounded-2xl border border-black/10 bg-white px-6 py-3.5 text-sm outline-none focus:border-[#D4AF37] transition-all shadow-sm group-hover:shadow-md"
                        />
                        <i class="bi bi-search absolute right-5 top-1/2 -translate-y-1/2 text-black/30 group-hover:text-[#D4AF37] transition-colors"></i>
                    </div>
                    <div class="flex gap-3">
                        <select name="sort" class="flex-1 sm:flex-none rounded-2xl border border-black/10 bg-white px-6 py-3.5 text-[10px] font-bold tracking-[0.2em] uppercase outline-none focus:border-[#D4AF37] transition-all cursor-pointer">
                            <?php ($sortValue = $sort ?? request('sort', 'newest')); ?>
                            <option value="newest" <?php if($sortValue === 'newest'): echo 'selected'; endif; ?>>Newest First</option>
                            <option value="oldest" <?php if($sortValue === 'oldest'): echo 'selected'; endif; ?>>Oldest First</option>
                            <option value="price_asc" <?php if($sortValue === 'price_asc'): echo 'selected'; endif; ?>>Price: Low to High</option>
                            <option value="price_desc" <?php if($sortValue === 'price_desc'): echo 'selected'; endif; ?>>Price: High to Low</option>
                            <option value="name_asc" <?php if($sortValue === 'name_asc'): echo 'selected'; endif; ?>>Name: A–Z</option>
                            <option value="name_desc" <?php if($sortValue === 'name_desc'): echo 'selected'; endif; ?>>Name: Z–A</option>
                        </select>
                        <button type="submit" class="bg-[#2b0505] text-white px-8 py-3.5 text-[10px] font-bold tracking-[0.2em] uppercase rounded-2xl hover:bg-[#4a0a0a] transition-all transform active:scale-95">
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[300px_minmax(0,1fr)] gap-12">
                
                <aside class="hidden lg:block space-y-8">
                    <form action="<?php echo e(route('shop.index')); ?>" method="GET" class="sticky top-28 space-y-8">
                        <input type="hidden" name="q" value="<?php echo e($search ?? request('q')); ?>">
                        <input type="hidden" name="sort" value="<?php echo e($sort ?? request('sort', 'newest')); ?>">
                        <input type="hidden" name="category" value="<?php echo e($activeCategory); ?>">
                        
                        
                        <div class="bg-white rounded-3xl border border-black/5 p-8 shadow-sm">
                            <h3 class="text-[11px] font-bold tracking-[0.25em] uppercase text-[#2b0505] mb-6">Categories</h3>
                            <div class="space-y-4">
                                <a href="<?php echo e(route('shop.index', array_merge(request()->query(), ['category' => null, 'page' => null]))); ?>" 
                                   class="flex items-center group no-underline <?php echo e(!$activeCategory ? 'text-[#b08d57] font-bold' : 'text-black/60'); ?> hover:text-[#b08d57] transition-colors">
                                    <span class="text-sm">All Categories</span>
                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ($availableCategories ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('shop.index', array_merge(request()->query(), ['category' => $cat, 'page' => null]))); ?>" 
                                       class="flex items-center group no-underline <?php echo e($activeCategory === $cat ? 'text-[#b08d57] font-bold' : 'text-black/60'); ?> hover:text-[#b08d57] transition-colors">
                                        <span class="text-sm"><?php echo e($cat); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="bg-white rounded-3xl border border-black/5 p-8 shadow-sm">
                            <h3 class="text-[11px] font-bold tracking-[0.25em] uppercase text-[#2b0505] mb-6">Price Range</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <span class="text-[9px] font-bold uppercase tracking-widest text-black/30 ml-1">Min</span>
                                    <input type="number" name="min" value="<?php echo e($min ?? request('min')); ?>" placeholder="0" class="w-full rounded-xl border border-black/10 bg-[#FCF9F5] px-4 py-3 text-sm outline-none focus:border-[#D4AF37] transition-colors">
                                </div>
                                <div class="space-y-2">
                                    <span class="text-[9px] font-bold uppercase tracking-widest text-black/30 ml-1">Max</span>
                                    <input type="number" name="max" value="<?php echo e($max ?? request('max')); ?>" placeholder="99k+" class="w-full rounded-xl border border-black/10 bg-[#FCF9F5] px-4 py-3 text-sm outline-none focus:border-[#D4AF37] transition-colors">
                                </div>
                            </div>
                            <button type="submit" class="mt-6 w-full py-4 text-[10px] font-bold tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded-2xl hover:bg-[#4a0a0a] transition-all">
                                Apply Range
                            </button>
                        </div>

                        <a href="<?php echo e(route('shop.index')); ?>" class="block text-center text-[10px] font-bold tracking-[0.25em] uppercase text-black/40 hover:text-[#D4AF37] transition-colors no-underline">
                            Reset All Filters
                        </a>
                    </form>
                </aside>

                
                <section>
                    <div class="flex items-center justify-between mb-8">
                        <p class="text-[10px] font-bold tracking-widest uppercase text-black/40">
                            Showing <?php echo e($products->count()); ?> of <?php echo e(method_exists($products, 'total') ? $products->total() : $products->count()); ?> Masterpieces
                        </p>
                        <div class="lg:hidden">
                            
                            <button class="flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-[#2b0505]">
                                <i class="bi bi-sliders"></i> Filters
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-black/5 group relative">
                                <div class="aspect-square overflow-hidden relative">
                                    <img src="<?php echo e($product->image ? asset('storage/' . (str_starts_with($product->image, 'products/') || str_starts_with($product->image, 'categories/') ? $product->image : 'products/' . $product->image)) : 'https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=1000'); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                                         alt="<?php echo e($product->name); ?>">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->categoryRel): ?>
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-white/90 backdrop-blur-sm text-[#2b0505] text-[8px] font-bold uppercase tracking-widest px-2 py-1 rounded-full shadow-sm">
                                                <?php echo e($product->categoryRel->name); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="bg-white text-[#2b0505] h-10 w-10 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                                <i class="bi bi-cart-plus text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="p-4 text-center">
                                    <h5 class="serif text-sm text-[#2b0505] mb-2 font-medium leading-tight line-clamp-2"><?php echo e($product->name); ?></h5>
                                    <div class="flex items-center justify-center gap-2 mb-4">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price): ?>
                                            <span class="text-gray-400 text-xs line-through">₹<?php echo e(number_format($product->regular_price, 0)); ?></span>
                                            <span class="text-[#D4AF37] font-bold text-sm">₹<?php echo e(number_format($product->sale_price, 0)); ?></span>
                                        <?php else: ?>
                                            <span class="text-[#D4AF37] font-bold text-sm">₹<?php echo e(number_format($product->regular_price, 0)); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="contents">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="py-2 text-[8px] font-bold tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded-lg hover:bg-[#4a0a0a] transition-all">
                                                Add to Cart
                                            </button>
                                        </form>
                                        <a href="<?php echo e(route('product.details', $product->slug)); ?>" class="py-2 text-[8px] font-bold tracking-[0.2em] uppercase border border-black/10 text-black/60 rounded-lg hover:bg-black/5 transition-all no-underline flex items-center justify-center">
                                            Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-black/10">
                                <i class="bi bi-search text-4xl text-black/10 mb-4 block"></i>
                                <h3 class="serif text-2xl text-black/30">No products found</h3>
                                <p class="text-black/40 text-sm mt-2">Try adjusting your filters or search terms.</p>
                                <a href="<?php echo e(route('shop.index')); ?>" class="mt-8 inline-block text-[10px] font-bold tracking-widest uppercase text-[#D4AF37] hover:underline">
                                    Clear all filters
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(method_exists($products, 'links')): ?>
                        <div class="mt-16">
                            <?php echo e($products->links()); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const shopSwiper = new Swiper('.shop-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.shop-swiper-next',
                prevEl: '.shop-swiper-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 2,
                },
                1280: {
                    slidesPerView: 3,
                },
            }
        });

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
                    alert('Product added to cart!');
                    // Update cart count in header if needed
                    const cartCountElement = document.querySelector('.cart-count');
                    if (cartCountElement) {
                        cartCountElement.innerText = data.cart_count;
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\shop.blade.php ENDPATH**/ ?>