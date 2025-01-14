<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Guest components
use App\Livewire\Guest\Home\Index;
use App\Livewire\Guest\About\About;
use App\Livewire\Guest\Shop\Shop;
use App\Livewire\Guest\Contact\Contact;
use App\Livewire\Guest\Error\Page\Denied;
use App\Livewire\Guest\Shipping\AboutShipping;
use App\Livewire\Guest\Commande\AboutCommend;
use App\Livewire\Guest\Cancel\AboutCancel;

// Product components
use App\Livewire\Products\ProductDetails;

// Admin components
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Invoices\Invoicelist;
use App\Livewire\Admin\Invoices\Invoiceview;
use App\Livewire\Admin\Adminproduct\Adminproduct;
use App\Livewire\Admin\Adminproduct\Adminproductdetails;
use App\Livewire\Admin\Category\Category;
use App\Livewire\Admin\Stock\Stock;
use App\Livewire\Admin\Promotion\Promotion;
use App\Livewire\Admin\Shipping\Shipping;
use App\Livewire\Admin\Message\ContactMessage;

// Order processing components
use App\Livewire\ProcessOrder\Checkout;
use App\Livewire\ProcessOrder\Payment;
use App\Livewire\ProcessOrder\OrderCompleted;
use App\Livewire\ProcessOrder\OrderCancelled;

// Cart components
use App\Livewire\Cart\Cartshow;


use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryDelete;

use App\Livewire\Admin\Product\ProductStore;
use App\Livewire\Admin\Product\ProductUpdate;




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

    Route::get('/orders', AboutCommend::class)->name('help.orders');
    Route::get('/shipping', AboutShipping::class)->name('help.shipping');
    Route::get('/faq', Denied::class)->name('help.faq'); // Assuming Denied is a placeholder for the actual FAQ component
});

// Admin routes
Route::middleware(['auth', 'check.admin:9', 'verified'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');

    // Management routes
    Route::prefix('management')->group(function () {
        Route::get('/stock', Stock::class)->name('admin.stock.view');
        Route::get('/promotion', Promotion::class)->name('admin.promotions.view');
        Route::get('/shipping', Shipping::class)->name('admin.shipping.view');
    });

    // Category routes

    Route::prefix('categories')->name('categories.')->group(function () {
        // Route pour afficher la liste des catégories
        Route::get('/categories', Category::class)->name('list');
        // Route pour créer une nouvelle catégorie
        Route::get('/create', CategoryCreate::class)->name('create');
        // Route pour éditer une catégorie
        Route::get('/edit/{id}', CategoryEdit::class)->name('edit');
        // Route pour supprimer une catégorie
        Route::get('/delete/{id}', CategoryDelete::class)->name('delete');
    });

    // Product routes
    Route::prefix('products')->group(function () {
        Route::get('/', Adminproduct::class)->name('admin.products.view');
        Route::get('/{id}', Adminproductdetails::class)->name('admin.products.details');
    });

    // Invoice routes
    Route::prefix('invoices')->group(function () {
        Route::get('/', Invoicelist::class)->name('admin.invoices.list');
        Route::get('/{id}', Invoiceview::class)->name('admin.invoices.view');
    });

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/Message', ContactMessage::class)->name('admin.contact.message');

    });

    Route::prefix('product')->group(function () {
        Route::get('/create', ProductStore::class)->name('product.create');
        Route::get('/edit/{id}', ProductUpdate::class)->name('product.edit');
    });

});

// Fallback route
Route::fallback(function () {
    return view('404');
});

// Authentication routes
require __DIR__ . '/auth.php';
