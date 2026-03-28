<?php $__env->startSection('title', $product->name . ' - Radhe Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-[#FCF9F5]">
    
    <div class="container mx-auto px-4 py-4">
        <nav class="text-sm">
            <a href="<?php echo e(route('home')); ?>" class="text-black/60 hover:text-[#D4AF37]">Home</a>
            <span class="mx-2 text-black/30">/</span>
            <a href="<?php echo e(route('shop.index')); ?>" class="text-black/60 hover:text-[#D4AF37]">Shop</a>
            <span class="mx-2 text-black/30">/</span>
            <span class="text-[#2b0505]"><?php echo e($product->name); ?></span>
        </nav>
    </div>

    
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="relative">
                <div class="aspect-[4/5] rounded-3xl overflow-hidden bg-white shadow-lg">
                    <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=1000'); ?>" 
                         class="w-full h-full object-cover" 
                         alt="<?php echo e($product->name); ?>">
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->categoryRel): ?>
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-[#2b0505] text-[9px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-sm">
                            <?php echo e($product->categoryRel->name); ?>

                        </span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="space-y-6">
                <div>
                    <h1 class="serif text-3xl md:text-4xl text-[#2b0505] mb-4"><?php echo e($product->name); ?></h1>
                    <div class="flex items-center gap-3 mb-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price): ?>
                            <span class="text-black/30 text-lg line-through">₹<?php echo e(number_format($product->regular_price, 0)); ?></span>
                            <span class="text-[#D4AF37] text-2xl font-bold">₹<?php echo e(number_format($product->sale_price, 0)); ?></span>
                        <?php else: ?>
                            <span class="text-[#D4AF37] text-2xl font-bold">₹<?php echo e(number_format($product->regular_price, 0)); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="text-black/60 leading-relaxed"><?php echo e($product->description); ?></p>
                </div>

                
                <div class="pt-6 border-t border-black/10">
                    <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        
                        <div class="flex items-center gap-4">
                            <label class="text-sm font-semibold text-[#2b0505]">Quantity:</label>
                            <div class="flex items-center border border-black/10 rounded-xl overflow-hidden">
                                <button type="button" onclick="this.parentElement.querySelector('input').stepDown()" class="px-4 py-2 bg-white hover:bg-gray-50 transition-colors">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->quantity); ?>" class="w-16 text-center border-x border-black/10 py-2 outline-none">
                                <button type="button" onclick="this.parentElement.querySelector('input').stepUp()" class="px-4 py-2 bg-white hover:bg-gray-50 transition-colors">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-[#2b0505] text-white rounded-2xl font-bold tracking-widest uppercase hover:bg-[#4a0a0a] transition-all transform hover:-translate-y-0.5 shadow-lg">
                            Add to Cart
                        </button>
                    </form>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->style_id || $product->sla_days || $product->hsn_code || $product->weight || $product->gst_percentage): ?>
                <div class="pt-6 border-t border-black/10">
                    <h3 class="text-lg font-bold text-[#2b0505] mb-4">Product Specifications</h3>
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden">
                        <table class="w-full">
                            <tbody>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->style_id): ?>
                                <tr class="border-b border-black/5">
                                    <td class="px-6 py-4 text-sm text-black/60 font-medium w-1/3">Style ID</td>
                                    <td class="px-6 py-4 text-sm text-[#2b0505] font-semibold"><?php echo e($product->style_id); ?></td>
                                </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sla_days): ?>
                                <tr class="border-b border-black/5">
                                    <td class="px-6 py-4 text-sm text-black/60 font-medium w-1/3">Dispatch Time (SLA)</td>
                                    <td class="px-6 py-4 text-sm text-[#2b0505] font-semibold"><?php echo e($product->sla_days); ?> Days</td>
                                </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->hsn_code): ?>
                                <tr class="border-b border-black/5">
                                    <td class="px-6 py-4 text-sm text-black/60 font-medium w-1/3">HSN Code</td>
                                    <td class="px-6 py-4 text-sm text-[#2b0505] font-semibold"><?php echo e($product->hsn_code); ?></td>
                                </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->weight): ?>
                                <tr class="border-b border-black/5">
                                    <td class="px-6 py-4 text-sm text-black/60 font-medium w-1/3">Weight</td>
                                    <td class="px-6 py-4 text-sm text-[#2b0505] font-semibold"><?php echo e(number_format($product->weight, 2)); ?>g</td>
                                </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->gst_percentage): ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm text-black/60 font-medium w-1/3">GST</td>
                                    <td class="px-6 py-4 text-sm text-[#2b0505] font-semibold"><?php echo e(number_format($product->gst_percentage, 2)); ?>%</td>
                                </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="pt-6 border-t border-black/10 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-black/60">SKU:</span>
                        <span class="font-semibold text-[#2b0505]"><?php echo e($product->SKU); ?></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-black/60">Stock Status:</span>
                        <span class="font-semibold <?php echo e($product->stock_status === 'instock' ? 'text-green-600' : 'text-red-600'); ?>">
                            <?php echo e($product->stock_status === 'instock' ? 'In Stock' : 'Out of Stock'); ?>

                        </span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->quantity > 0): ?>
                        <div class="flex justify-between text-sm">
                            <span class="text-black/60">Available:</span>
                            <span class="font-semibold text-[#2b0505]"><?php echo e($product->quantity); ?> items</span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($relatedProducts) && $relatedProducts->count() > 0): ?>
        <div class="container mx-auto px-4 py-12 border-t border-black/10">
            <h2 class="serif text-2xl text-[#2b0505] mb-8">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials.product-card', ['product' => $relatedProduct], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\product.blade.php ENDPATH**/ ?>