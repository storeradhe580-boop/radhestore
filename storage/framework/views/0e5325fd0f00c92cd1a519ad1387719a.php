
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'image' => null,
    'alt' => 'Image',
    'class' => '',
    'fallback' => 'https://res.cloudinary.com/demo/image/upload/v1/default-placeholder.jpg'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'image' => null,
    'alt' => 'Image',
    'class' => '',
    'fallback' => 'https://res.cloudinary.com/demo/image/upload/v1/default-placeholder.jpg'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $imageUrl = $fallback;
    
    if ($image) {
        // Check if image is a full URL (Cloudinary)
        if (str_starts_with($image, 'http')) {
            $imageUrl = $image;
        }
        // Check if image is a local path
        else {
            $fullPath = storage_path('app/public/' . $image);
            if (file_exists($fullPath)) {
                $imageUrl = asset('storage/' . $image);
            }
        }
    }
?>

<img src="<?php echo e($imageUrl); ?>" 
     alt="<?php echo e($alt); ?>" 
     class="<?php echo e($class); ?>" 
     onerror="this.src='<?php echo e($fallback); ?>'" />
<?php /**PATH E:\radhe-shop\radhe-shop\resources\views\components\smart-image.blade.php ENDPATH**/ ?>