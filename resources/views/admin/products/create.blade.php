@extends('layouts.app')

@section('title', 'Create Product - Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Create Product</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2">Product Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium mb-2">Slug *</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium mb-2">Category *</label>
                <select name="category_id" id="category_id" required class="w-full px-3 py-2 border rounded">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="regular_price" class="block text-sm font-medium mb-2">Regular Price (₹) *</label>
                <input type="number" name="regular_price" id="regular_price" value="{{ old('regular_price') }}" required min="0" step="0.01"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="sale_price" class="block text-sm font-medium mb-2">Sale Price (₹)</label>
                <input type="number" name="sale_price" id="sale_price" value="{{ old('sale_price') }}" min="0" step="0.01"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="SKU" class="block text-sm font-medium mb-2">SKU *</label>
                <input type="text" name="SKU" id="SKU" value="{{ old('SKU') }}" required
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium mb-2">Quantity *</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 0) }}" required min="0"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="stock_status" class="block text-sm font-medium mb-2">Stock Status *</label>
                <select name="stock_status" id="stock_status" required class="w-full px-3 py-2 border rounded">
                    <option value="instock" {{ old('stock_status') == 'instock' ? 'selected' : '' }}>In Stock</option>
                    <option value="outofstock" {{ old('stock_status') == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium mb-2">Product Image *</label>
                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg" required
                       class="w-full px-3 py-2 border rounded">
                <p class="text-xs text-gray-500 mt-1">Max size: 2MB. Accepted: jpg, jpeg, png</p>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
