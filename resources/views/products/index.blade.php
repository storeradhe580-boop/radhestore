@extends('layouts.app')

@section('title', 'All Products - Radhe Store')

@section('content')
    <!-- Products Section -->
    <section class="py-8 bg-[#FCF9F5]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-[10px] tracking-[0.25em] uppercase text-[#D4AF37] font-bold mb-2">Collection</p>
                    <h1 class="serif text-2xl md:text-3xl text-[#2b0505]">All Products</h1>
                </div>
                <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-[#2b0505] text-white text-sm font-semibold rounded hover:bg-[#D4AF37] hover:text-[#2b0505] transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Product
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Product Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 border border-black/5 group">
                        <div class="h-48 md:h-56 overflow-hidden relative">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?auto=format&fit=crop&q=80&w=1000' }}" loading="lazy" decoding="async" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $product->name }}">
                            
                            @if($product->category)
                                <div class="absolute top-2 left-2">
                                    <span class="bg-white/90 backdrop-blur-sm text-[#2b0505] text-[7px] font-bold uppercase tracking-widest px-1.5 py-0.5 rounded-full shadow-sm">
                                        {{ $product->category->name }}
                                    </span>
                                </div>
                            @endif

                            @if($product->sale_price)
                                <span class="absolute top-2 right-2 bg-[#800000] text-white text-[7px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded shadow-md">SALE</span>
                            @endif

                            <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                @auth
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="bg-white text-[#2b0505] h-8 w-8 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                        <i class="bi bi-cart-plus text-sm"></i>
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="bg-white text-[#2b0505] h-8 w-8 rounded-full flex items-center justify-center shadow-lg transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500 hover:bg-[#D4AF37] hover:text-white">
                                    <i class="bi bi-cart-plus text-sm"></i>
                                </a>
                                @endauth
                            </div>
                        </div>
                        <div class="p-3 text-center">
                            <h5 class="serif text-xs text-[#2b0505] mb-1 font-medium leading-tight line-clamp-2 text-center">{{ $product->name }}</h5>
                            <div class="flex items-center justify-center gap-1 mb-3">
                                @if($product->sale_price)
                                    <span class="text-gray-400 text-xs line-through">₹{{ number_format($product->regular_price, 0) }}</span>
                                    <span class="text-[#D4AF37] font-bold text-xs">₹{{ number_format($product->sale_price, 0) }}</span>
                                @else
                                    <span class="text-[#D4AF37] font-bold text-xs">₹{{ number_format($product->regular_price ?? $product->price, 0) }}</span>
                                @endif
                            </div>
                            <div class="grid grid-cols-2 gap-1.5">
                                @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="contents">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="py-1.5 text-[7px] font-bold tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded-md hover:bg-[#4a0a0a] transition-all">
                                        ADD TO CART
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="py-1.5 text-[7px] font-bold tracking-[0.2em] uppercase bg-[#2b0505] text-white rounded-md hover:bg-[#4a0a0a] transition-all flex items-center justify-center">
                                    LOGIN
                                </a>
                                @endauth
                                <a href="{{ route('product.details', $product->slug) }}" class="py-1.5 text-[7px] font-bold tracking-[0.2em] uppercase border border-black/10 text-black/60 bg-white rounded-md hover:bg-black/5 transition-all no-underline flex items-center justify-center">
                                    DETAILS
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">No products found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
