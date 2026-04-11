@extends('layouts.app')

@section('title', 'Test Payment - Razorpay')

@section('content')
<div class="w-full max-w-md mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h1 class="text-2xl font-bold text-[#2b0505] mb-6 text-center">Test Razorpay Payment</h1>
        
        <!-- Amount Input -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Amount (INR)</label>
            <input type="number" id="amount" value="100" min="1" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37] text-lg">
        </div>
        
        <!-- Pay Button -->
        <button id="pay-btn" 
                class="w-full py-4 bg-[#2b0505] text-white font-bold rounded-lg hover:bg-[#4a0a0a] transition-all duration-300 flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Pay Now
        </button>
        
        <!-- Status -->
        <div id="status" class="mt-6 text-center hidden">
            <p class="text-sm text-gray-600"></p>
        </div>
        
        <!-- Payment Methods Info -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-xs text-gray-500 mb-2 font-semibold">Available Payment Methods:</p>
            <div class="flex flex-wrap gap-2 justify-center">
                <span class="px-2 py-1 bg-white rounded text-xs border border-gray-200">💳 Card</span>
                <span class="px-2 py-1 bg-white rounded text-xs border border-gray-200">📱 UPI (GPay, PhonePe, Paytm)</span>
                <span class="px-2 py-1 bg-white rounded text-xs border border-gray-200">🏦 Netbanking</span>
                <span class="px-2 py-1 bg-white rounded text-xs border border-gray-200">👛 Wallet</span>
            </div>
            <p class="text-xs text-gray-400 mt-2 text-center">
                💡 Note: UPI may show limited options in test mode. Use live keys for full UPI support.
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('pay-btn').addEventListener('click', async function() {
    const btn = this;
    const statusDiv = document.getElementById('status');
    const amount = document.getElementById('amount').value;
    
    btn.disabled = true;
    btn.innerHTML = 'Processing...';
    statusDiv.classList.add('hidden');
    
    try {
        // Step 1: Create order on server
        const response = await fetch('/create-order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ amount: amount })
        });
        
        const data = await response.json();
        
        if (!response.ok || data.error) {
            throw new Error(data.error || 'Failed to create order');
        }
        
        // Step 2: Open Razorpay checkout with UPI enabled
        const options = {
            key: data.key,
            amount: data.amount,
            currency: data.currency,
            name: 'Radhe Store',
            description: 'Test Payment',
            order_id: data.order_id,
            // Enable all payment methods including UPI
            method: {
                upi: {
                    flow: 'collect', // or 'intent' for intent flow
                    apps: ['google_pay', 'phonepe', 'paytm', 'bhim', 'amazon_pay']
                },
                card: true,
                netbanking: true,
                wallet: true,
                emi: false,
                paylater: false
            },
            // UPI specific configuration
            config: {
                display: {
                    language: 'en'
                }
            },
            handler: function(response) {
                // Payment successful
                statusDiv.innerHTML = `
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        <p class="font-bold">Payment Successful!</p>
                        <p class="text-xs mt-1">Payment ID: ${response.razorpay_payment_id}</p>
                    </div>
                `;
                statusDiv.classList.remove('hidden');
                btn.disabled = false;
                btn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Pay Now
                `;
            },
            prefill: {
                name: '{{ Auth::user()->name ?? "Customer" }}',
                email: '{{ Auth::user()->email ?? "" }}',
                contact: '{{ Auth::user()->phone ?? "" }}',
                method: 'upi', // Prefer UPI as default method
                vpa: '' // User can enter their UPI ID
            },
            notes: {
                address: 'Radhe Store Payment',
                merchant_order_id: data.order_id
            },
            theme: {
                color: '#2b0505',
                backdrop_color: '#000000' // Darker backdrop for better visibility
            },
            modal: {
                ondismiss: function() {
                    btn.disabled = false;
                    btn.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Pay Now
                    `;
                }
            }
        };
        
        const rzp = new Razorpay(options);
        
        rzp.on('payment.failed', function(response) {
            statusDiv.innerHTML = `
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <p class="font-bold">Payment Failed</p>
                    <p class="text-xs mt-1">${response.error.description}</p>
                </div>
            `;
            statusDiv.classList.remove('hidden');
            btn.disabled = false;
            btn.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Pay Now
            `;
        });
        
        rzp.open();
        
    } catch (error) {
        statusDiv.innerHTML = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <p class="font-bold">Error</p>
                <p class="text-xs mt-1">${error.message}</p>
            </div>
        `;
        statusDiv.classList.remove('hidden');
        btn.disabled = false;
        btn.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Pay Now
        `;
    }
});
</script>
@endpush
