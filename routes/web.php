<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderTrackController;
use App\Http\Controllers\ImageUploadController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/order-success/{id}', [CheckoutController::class, 'success'])->name('order.success');
Route::get('/order-confirmation/{id}', [CheckoutController::class, 'receipt'])->name('order.confirmation');
Route::get('/order-receipt/{id}', [CheckoutController::class, 'receipt'])->name('order.receipt');
Route::get('/order/track', [OrderTrackController::class, 'index'])->name('order.track');
Route::get('/track-order', [OrderTrackController::class, 'showTrackForm'])->name('order.track.form');
Route::post('/track-order', [OrderTrackController::class, 'trackOrder'])->name('order.track.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{slug}/details', [ProductController::class, 'show'])->name('product.details');

// Product CRUD Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/return-policy', function () {
    return view('return-policy');
})->name('return.policy');

Route::get('/shipping-info', [App\Http\Controllers\HomeController::class, 'shippingInfo'])->name('shipping.info');

Route::get('/faqs', [App\Http\Controllers\HomeController::class, 'faq'])->name('faqs');

Route::get('/page/{slug}', [App\Http\Controllers\HomeController::class, 'page'])->name('page.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.dashboard');

Route::get('/db-check', function () {
    $config = config('database.connections.pgsql');
    return response()->json([
        'driver' => $config['driver'] ?? 'not set',
        'host' => $config['host'] ?? 'not set',
        'port' => $config['port'] ?? 'not set',
        'database' => $config['database'] ?? 'not set',
        'sslmode' => $config['sslmode'] ?? 'not set',
    ]);
});

Route::get('/run-migrate', function () {
    try {
        // Force internal host for Render connection
        config(['database.connections.pgsql.host' => 'dpg-d72ghbh9fqoc73a9f3f0-a']);
        \DB::purge('pgsql');
        \DB::reconnect('pgsql');
        
        Artisan::call('migrate', ['--force' => true]);
        return "Migration Successful!";
    } catch (Exception $e) {
        return "Migration Error: " . $e->getMessage();
    }
});

Route::get('/setup-admin', function () {
   
    $user = User::where('email', 'radhe0800@gmail.com')->first();

    if ($user) {
     
        $user->update([
            'password' => Hash::make('8724'),
        ]);
        return "Admin Password Updated to: 8724";
    } else {
       
        User::create([
            'name' => 'Radhe Admin',
            'email' => 'radhe0800@gmail.com',
            'password' => Hash::make('8724'),
        ]);
        return "New Admin Account Created! Email: radhe0800@gmail.com, Pass: 8724";
    }
});

// Image Upload Routes for Cloudinary
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('image.upload');
Route::post('/delete-image', [ImageUploadController::class, 'deleteImage'])->name('image.delete');
Route::get('/image-info/{public_id}', [ImageUploadController::class, 'getImageInfo'])->name('image.info');

// Storage Link Route for Production
Route::get('/storage-link', function () {
    try {
        if (!file_exists(public_path('storage'))) {
            Artisan::call('storage:link');
            return "Storage link created successfully!";
        } else {
            return "Storage link already exists!";
        }
    } catch (Exception $e) {
        return "Error creating storage link: " . $e->getMessage();
    }
});

// Debug Category Images Route
Route::get('/debug-categories', function () {
    $categories = \App\Models\Category::all();
    
    $debug = [];
    foreach ($categories as $category) {
        $isCloudinary = str_starts_with($category->image, 'http');
        $debug[] = [
            'id' => $category->id,
            'name' => $category->name,
            'image' => $category->image,
            'is_cloudinary' => $isCloudinary,
            'type' => $isCloudinary ? 'Cloudinary URL' : 'Local Storage Path',
            'needs_reupload' => !$isCloudinary,
        ];
    }
    
    return response()->json($debug);
});

// Debug Slider Images Route
Route::get('/debug-sliders', function () {
    $sliders = \App\Models\Slider::all();
    
    $debug = [];
    foreach ($sliders as $slider) {
        $isCloudinary = str_starts_with($slider->image, 'http');
        $debug[] = [
            'id' => $slider->id,
            'title' => $slider->title,
            'image' => $slider->image,
            'is_cloudinary' => $isCloudinary,
            'type' => $isCloudinary ? 'Cloudinary URL' : 'Local Storage Path',
            'needs_reupload' => !$isCloudinary,
        ];
    }
    
    return response()->json($debug);
});

