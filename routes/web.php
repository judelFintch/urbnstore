<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Guest\{
    Home\Index,
    About\About,
    Shop\Shop,
    Contact\Contact,
    Error\Page\Denied
};
use App\Livewire\Products\ProductDetails;
use App\Livewire\Admin\{
    AdminDashboard,
    Invoices\Invoicelist,
    Invoices\Invoiceview,
    Adminproduct\Adminproduct,
    Adminproduct\Adminproductdetails,
    Category\Category,
    Stock\Stock,
    Promotion\Promotion,
    Shipping\Shipping
};

use App\Livewire\ProcessOrder\{
    Checkout,
    Payment,
    OrderCompleted,
    OrderCancelled
};

use App\Livewire\Cart\Cartshow;

// Public routes
Route::prefix('/')->group(function () {
    Route::get('/', Index::class)->name('home.index');
    Route::get('/about', About::class)->name('home.about');
    Route::get('/shop/{id}/{slug}', Shop::class)
        ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9\-]+'])
        ->name('home.shop');
    Route::get('/contact', Contact::class)->name('home.contact');
    Route::get('/product/{id}/{category}/{slug}', ProductDetails::class)->name('show-product');
    Route::get('/access_denied', Denied::class)->name('access.denied');
    Route::get('/cart', Cartshow::class)->name('cart.details');

    //route processing

    Route::get('/checkout', Checkout::class)->name('process.checkout');
    

});

// Admin routes
Route::middleware(['auth', 'check.admin:9', 'verified'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');

    // Stock & Promotions
    Route::get('/stock', Stock::class)->name('admin.stock.view');
    Route::get('/promotion', Promotion::class)->name('admin.promotions.view');
    Route::get('/shipping', Shipping::class)->name('admin.shipping.view');

    // Category routes
    Route::get('/categories', Category::class)->name('admin.category.view');

    // Product routes
    Route::get('/products', Adminproduct::class)->name('admin.products.view');
    Route::get('/products/{id}', Adminproductdetails::class)->name('admin.products.details');

    // Invoice routes
    Route::get('/invoices', Invoicelist::class)->name('admin.invoices.list');
    Route::get('/invoices/{id}', Invoiceview::class)->name('admin.invoices.view');

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Fallback route
Route::fallback(function () {
    return view('404');
});

// Authentication routes
require __DIR__ . '/auth.php';
