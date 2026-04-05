@extends('layouts.app')

@section('title', 'Add Product - Radhe Store')

@section('content')
    <!-- Add Product Form -->
    <section class="py-8 bg-[#FCF9F5]">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <p class="text-[10px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-2">Admin</p>
                <h1 class="serif text-2xl md:text-3xl text-[#2b0505]">Add New Product</h1>
            </div>

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-black/5 p-6 md:p-8">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div class="col-span-2">
                            <label for="name" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Product Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="Enter product name">
                        </div>

                        <!-- Slug -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="slug" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Slug *</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="product-url-slug">
                        </div>

                        <!-- Category -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="category_id" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Category *</label>
                            <select name="category_id" id="category_id" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors bg-white">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Regular Price -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="regular_price" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Regular Price (₹) *</label>
                            <input type="number" name="regular_price" id="regular_price" value="{{ old('regular_price') }}" required min="0" step="0.01"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="999.00">
                        </div>

                        <!-- Sale Price -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="sale_price" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Sale Price (₹)</label>
                            <input type="number" name="sale_price" id="sale_price" value="{{ old('sale_price') }}" min="0" step="0.01"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="799.00 (optional)">
                        </div>

                        <!-- SKU -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="SKU" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">SKU *</label>
                            <input type="text" name="SKU" id="SKU" value="{{ old('SKU') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="PROD-001">
                        </div>

                        <!-- Quantity -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="quantity" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Quantity *</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 0) }}" required min="0"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors"
                                   placeholder="100">
                        </div>

                        <!-- Stock Status -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="stock_status" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Stock Status *</label>
                            <select name="stock_status" id="stock_status" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors bg-white">
                                <option value="instock" {{ old('stock_status') == 'instock' ? 'selected' : '' }}>In Stock</option>
                                <option value="outofstock" {{ old('stock_status') == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>

                        <!-- Product Image -->
                        <div class="col-span-2 md:col-span-1">
                            <label for="image" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Product Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#FCF9F5] file:text-[#2b0505] hover:file:bg-[#D4AF37] hover:file:text-white">
                        </div>

                        <!-- Description -->
                        <div class="col-span-2">
                            <label for="description" class="block text-xs font-bold text-[#2b0505] uppercase tracking-wider mb-2">Description</label>
                            <textarea name="description" id="description" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-colors resize-none"
                                      placeholder="Enter product description...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('products.index') }}" class="px-6 py-3 text-sm font-semibold text-gray-600 hover:text-[#2b0505] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-8 py-3 bg-[#2b0505] text-white text-sm font-semibold rounded-lg hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
