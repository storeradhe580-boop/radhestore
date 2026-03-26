<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH E:\radhe-shop\radhe-shop\vendor\filament\forms\resources\views\components\grid.blade.php ENDPATH**/ ?>