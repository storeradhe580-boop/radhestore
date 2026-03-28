<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($category->name ?? $category->category_name); ?> - Radhe Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-[#111111]">
    <div class="max-w-5xl mx-auto px-4 py-10">
        <a href="<?php echo e(url()->previous()); ?>" class="text-sm text-blue-600 hover:underline">&larr; Back</a>
        <h1 class="text-3xl font-semibold mt-4">
            <?php echo e($category->name ?? $category->category_name); ?>

        </h1>
        <p class="mt-2 text-sm text-gray-600">
            Category detail page placeholder. You can customize this layout later.
        </p>
    </div>
</body>
</html>

<?php /**PATH E:\radhe-shop\radhe-shop\resources\views\category\show.blade.php ENDPATH**/ ?>