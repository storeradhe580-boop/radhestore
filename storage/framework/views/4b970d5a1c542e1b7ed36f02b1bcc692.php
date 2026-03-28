<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center py-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to Radhe Store</h2>
                    <p class="text-gray-600 mb-6">Discover our exquisite collection of traditional and modern jewelry.</p>
                    <a href="<?php echo e(route('shop.index')); ?>" class="inline-block bg-[#D4AF37] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#b88a2b] transition-colors">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\home.blade.php ENDPATH**/ ?>