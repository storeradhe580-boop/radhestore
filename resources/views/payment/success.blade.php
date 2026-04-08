@extends('layouts.app')

@section('title', 'Order Successful - Radhe Store')

@section('content')
<div class="w-full max-w-2xl mx-auto px-3 md:px-10 py-12">
    <div class="bg-white rounded-xl p-8 shadow-sm border border-black/5 text-center">
        <!-- Success Icon -->
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        
        <h1 class="text-2xl md:text-3xl font-bold text-[#2b0505] mb-2">Order Placed Successfully!</h1>
        <p class="text-gray-600 mb-6">Thank you for your purchase. Your order has been confirmed.</p>
        
        <!-- Order Details -->
        <div class="bg-[#FCF9F5] rounded-lg p-6 mb-6 text-left">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-gray-500 uppercase">Order Number</p>
                    <p class="text-lg font-bold text-[#2b0505]">{{ $order->order_number }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Order Date</p>
                    <p class="text-sm font-medium text-[#2b0505]">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Payment Method</p>
                    <p class="text-sm font-medium text-[#2b0505] capitalize">{{ $order->payment_method }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Payment Status</p>
                    <p class="text-sm font-medium text-green-600 capitalize">{{ $order->payment_status }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Order Status</p>
                    <p class="text-sm font-medium text-[#D4AF37] capitalize">{{ $order->order_status }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Total Amount</p>
                    <p class="text-lg font-bold text-[#D4AF37]">₹{{ number_format($order->total_amount, 0) }}</p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center justify-center px-8 py-3 bg-[#2b0505] text-white font-semibold rounded-lg hover:bg-[#4a0a0a] transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Continue Shopping
            </a>
            <a href="{{ route('dashboard') }}" 
               class="inline-flex items-center justify-center px-8 py-3 border-2 border-[#2b0505] text-[#2b0505] font-semibold rounded-lg hover:bg-[#2b0505] hover:text-white transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                View Orders
            </a>
        </div>
    </div>
</div>
@endsection
