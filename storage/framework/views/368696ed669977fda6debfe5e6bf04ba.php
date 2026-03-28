<?php $__env->startSection('title', $page->title . ' - Radhe Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="serif text-3xl md:text-4xl text-[#2b0505] mb-8 text-center"><?php echo e($page->title); ?></h1>
        
        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
            <div class="prose max-w-none prose-headings:text-[#2b0505] prose-a:text-[#D4AF37] prose-a:no-underline prose-a:hover:underline">
                <?php echo $page->content; ?>

            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="<?php echo e(route('home')); ?>" class="text-[#D4AF37] hover:underline text-sm">
                ← Back to Home
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\page.blade.php ENDPATH**/ ?>