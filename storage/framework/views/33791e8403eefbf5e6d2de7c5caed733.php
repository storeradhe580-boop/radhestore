
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
    <img src="<?php echo e($product->image); ?>" 
         alt="<?php echo e($product->name); ?>" 
         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
         onerror="this.src='https://res.cloudinary.com/demo/image/upload/v1/default-product.jpg'" />
<?php else: ?>
    <img src="https://res.cloudinary.com/demo/image/upload/v1/default-product.jpg" 
         alt="<?php echo e($product->name); ?>" 
         class="w-full h-full object-cover" />
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->image): ?>
    <img src="<?php echo e($category->image); ?>" 
         alt="<?php echo e($category->name); ?>" 
         class="w-full h-full object-cover" 
         onerror="this.src='https://res.cloudinary.com/demo/image/upload/v1/default-category.jpg'" />
<?php else: ?>
    <img src="https://res.cloudinary.com/demo/image/upload/v1/default-category.jpg" 
         alt="<?php echo e($category->name); ?>" 
         class="w-full h-full object-cover" />
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH E:\radhe-shop\radhe-shop\resources\views\components\cloudinary-image.blade.php ENDPATH**/ ?>