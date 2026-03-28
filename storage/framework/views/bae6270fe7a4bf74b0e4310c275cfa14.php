<?php $__env->startSection('title', 'Track Order - Radhe Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="serif text-3xl text-[#2b0505] mb-8 text-center">Track Your Order</h1>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->orders()->count() > 0): ?>
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <h2 class="serif text-xl text-[#2b0505] mb-6">Your Recent Orders</h2>
                <div class="space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = auth()->user()->orders()->latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-[#D4AF37] transition-colors">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Order ID / Order Number</p>
                                    <p class="font-semibold text-gray-900"><?php echo e($order->id); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($order->created_at->format('M d, Y - h:i A')); ?></p>
                                    <p class="text-sm text-gray-600">Total: ₹<?php echo e(number_format($order->total_amount, 2)); ?></p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full 
                                        <?php echo e($order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($order->status === 'shipped' ? 'bg-blue-100 text-blue-800' :
                                           'bg-gray-100 text-gray-800'))); ?>">
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                    <div class="mt-2">
                                        <a href="#" class="text-[#D4AF37] text-sm hover:underline">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->orders()->count() > 5): ?>
                    <div class="mt-4 text-center">
                        <a href="#" class="text-[#D4AF37] hover:underline">View All Orders</a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Orders Yet</h3>
                    <p class="text-gray-500 mb-4">You haven't placed any orders yet. Start shopping to see your orders here!</p>
                    <a href="<?php echo e(route('shop.index')); ?>" class="inline-flex items-center px-4 py-2 bg-[#D4AF37] text-white rounded-lg hover:bg-[#b88a2b] transition-colors">
                        Start Shopping
                    </a>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="serif text-xl text-[#2b0505] mb-6">Track Any Order</h2>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-800"><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <form method="POST" action="<?php echo e(route('order.track.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-6">
                    <label for="order_id" class="block text-sm font-medium text-[#2b0505] mb-2">Order ID / Order Number</label>
                    <input type="text" id="order_id" name="order_id" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#D4AF37] focus:border-[#D4AF37]" 
                           placeholder="Enter your order number (e.g., ORD-12345)"
                           value="<?php echo e(old('order_id', $searchedOrderId ?? '')); ?>">
                </div>
                
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-[#2b0505] mb-2">Email Address</label>
                    <input type="email" id="email" name="email" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#D4AF37] focus:border-[#D4AF37]" 
                           placeholder="Enter the email used for the order"
                           value="<?php echo e(old('email', $searchedEmail ?? '')); ?>">
                </div>
                
                <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-lg font-medium hover:bg-[#b88a2b] transition-colors">
                    Track Order
                </button>
            </form>
            
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-sm text-gray-600 text-center">
                    Need help? <a href="<?php echo e(route('contact')); ?>" class="text-[#D4AF37] hover:underline">Contact us</a> | 
                    <a href="<?php echo e(route('page.show', 'faq')); ?>" class="text-[#D4AF37] hover:underline">Check FAQ</a>
                </p>
            </div>
        </div>
        
        <!-- Dynamic Order Status -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($trackedOrder)): ?>
        <div class="mt-8 bg-white rounded-lg shadow-lg p-8">
            <h2 class="serif text-xl text-[#2b0505] mb-6">Order Status - <?php echo e($trackedOrder->id); ?></h2>
            
            <div class="space-y-4">
                <!-- Order Placed -->
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 <?php echo e($trackedOrder->status === 'pending' ? 'bg-[#D4AF37]/20' : (in_array($trackedOrder->status, ['processing', 'shipped', 'delivered']) ? 'bg-green-100' : 'bg-gray-100')); ?> rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 <?php echo e($trackedOrder->status === 'pending' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['processing', 'shipped', 'delivered']) ? 'text-green-600' : 'text-gray-400')); ?>" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold <?php echo e($trackedOrder->status === 'pending' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['processing', 'shipped', 'delivered']) ? 'text-gray-900' : 'text-gray-400')); ?>">Order Placed</p>
                        <p class="text-sm <?php echo e($trackedOrder->status === 'pending' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['processing', 'shipped', 'delivered']) ? 'text-gray-500' : 'text-gray-400')); ?>">Your order has been confirmed</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trackedOrder->placed_at): ?>
                            <p class="text-xs text-gray-400 mt-1">Placed on <?php echo e($trackedOrder->placed_at->format('F j, g:i A')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
                <div class="border-l-2 <?php echo e(in_array($trackedOrder->status, ['processing', 'shipped', 'delivered']) ? 'border-[#D4AF37]' : 'border-gray-200'); ?> ml-5 pl-8 space-y-4">
                    <!-- Processing -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 <?php echo e($trackedOrder->status === 'processing' ? 'bg-[#D4AF37]/20' : (in_array($trackedOrder->status, ['shipped', 'delivered']) ? 'bg-green-100' : 'bg-gray-100')); ?> rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 <?php echo e($trackedOrder->status === 'processing' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['shipped', 'delivered']) ? 'text-green-600' : 'text-gray-400')); ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold <?php echo e($trackedOrder->status === 'processing' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['shipped', 'delivered']) ? 'text-gray-900' : 'text-gray-400')); ?>">Processing</p>
                            <p class="text-sm <?php echo e($trackedOrder->status === 'processing' ? 'text-[#D4AF37]' : (in_array($trackedOrder->status, ['shipped', 'delivered']) ? 'text-gray-500' : 'text-gray-400')); ?>">Order is being prepared</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trackedOrder->processing_at): ?>
                                <p class="text-xs text-gray-400 mt-1">Processing started on <?php echo e($trackedOrder->processing_at->format('F j, g:i A')); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Shipped -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 <?php echo e($trackedOrder->status === 'shipped' ? 'bg-[#D4AF37]/20' : ($trackedOrder->status === 'delivered' ? 'bg-green-100' : 'bg-gray-100')); ?> rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 <?php echo e($trackedOrder->status === 'shipped' ? 'text-[#D4AF37]' : ($trackedOrder->status === 'delivered' ? 'text-green-600' : 'text-gray-400')); ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.185A2.984 2.984 0 016 13.5a2.984 2.984 0 012.815 2.5h5.37A2.984 2.984 0 0117 13.5a2.984 2.984 0 012.815 2.5H20a1 1 0 001-1V8a1 1 0 00-1-1h-6.5L11 5.5H8l-1.5 1.5H3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold <?php echo e($trackedOrder->status === 'shipped' ? 'text-[#D4AF37]' : ($trackedOrder->status === 'delivered' ? 'text-gray-900' : 'text-gray-400')); ?>">Shipped</p>
                            <p class="text-sm <?php echo e($trackedOrder->status === 'shipped' ? 'text-[#D4AF37]' : ($trackedOrder->status === 'delivered' ? 'text-gray-500' : 'text-gray-400')); ?>"><?php echo e($trackedOrder->status === 'shipped' ? 'Order has been shipped' : 'Waiting to be shipped'); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trackedOrder->shipped_at): ?>
                                <p class="text-xs text-gray-400 mt-1">Shipped on <?php echo e($trackedOrder->shipped_at->format('F j, g:i A')); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Delivered -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 <?php echo e($trackedOrder->status === 'delivered' ? 'bg-green-100' : 'bg-gray-100'); ?> rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 <?php echo e($trackedOrder->status === 'delivered' ? 'text-green-600' : 'text-gray-400'); ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold <?php echo e($trackedOrder->status === 'delivered' ? 'text-gray-900' : 'text-gray-400'); ?>">Delivered</p>
                            <p class="text-sm <?php echo e($trackedOrder->status === 'delivered' ? 'text-gray-500' : 'text-gray-400'); ?>"><?php echo e($trackedOrder->status === 'delivered' ? 'Order delivered successfully' : 'Waiting for delivery'); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trackedOrder->delivered_at): ?>
                                <p class="text-xs text-gray-400 mt-1">Delivered on <?php echo e($trackedOrder->delivered_at->format('F j, g:i A')); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Details -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="serif text-lg text-[#2b0505] mb-4">Order Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Items -->
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Items Purchased</h4>
                        <div class="space-y-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $trackedOrder->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <div>
                                        <p class="font-medium text-gray-900"><?php echo e($item->product->name); ?></p>
                                        <p class="text-sm text-gray-500">Qty: <?php echo e($item->quantity); ?> × ₹<?php echo e(number_format($item->price, 2)); ?></p>
                                    </div>
                                    <p class="font-semibold text-gray-900">₹<?php echo e(number_format($item->quantity * $item->price, 2)); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Order Summary</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Amount:</span>
                                <span class="font-semibold text-gray-900">₹<?php echo e(number_format($trackedOrder->total_amount, 2)); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-semibold <?php echo e($trackedOrder->status === 'delivered' ? 'text-green-600' : 'text-[#D4AF37]'); ?>">
                                    <?php echo e(ucfirst($trackedOrder->status)); ?>

                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order Date:</span>
                                <span class="font-semibold text-gray-900"><?php echo e($trackedOrder->created_at->format('M d, Y')); ?></span>
                            </div>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trackedOrder->shipping_address): ?>
                            <div class="mt-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Shipping Address</h4>
                                <?php
                                    $address = json_decode($trackedOrder->shipping_address);
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($address && is_object($address)): ?>
                                    <p class="text-sm text-gray-600">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($address->first_name) && isset($address->last_name)): ?>
                                            <?php echo e($address->first_name); ?> <?php echo e($address->last_name); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($address->address)): ?>
                                            <?php echo e($address->address); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($address->city) && isset($address->state) && isset($address->zip)): ?>
                                            <?php echo e($address->city); ?>, <?php echo e($address->state); ?> - <?php echo e($address->zip); ?>

                                        <?php elseif(isset($address->city) && isset($address->state)): ?>
                                            <?php echo e($address->city); ?>, <?php echo e($address->state); ?>

                                        <?php elseif(isset($address->city)): ?>
                                            <?php echo e($address->city); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($address->phone)): ?>
                                            <br>Phone: <?php echo e($address->phone); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </p>
                                <?php else: ?>
                                    <p class="text-sm text-gray-600"><?php echo e($trackedOrder->shipping_address); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\radhe-shop\radhe-shop\resources\views\order-track.blade.php ENDPATH**/ ?>