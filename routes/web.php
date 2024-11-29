<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Guest\{
    Home\Index,
    About\About,
    Shop\Shop,
    Contact\Contact
};
use App\Livewire\Products\ProductDetails;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Invoices\Invoicelist;
use App\Livewire\Admin\Invoices\Invoiceview;
use App\Livewire\Admin\Adminproduct\Adminproduct;
use App\Livewire\Guest\Error\Page\Denied;
use App\Livewire\Admin\Category\Category;
use App\Livewire\Admin\Stock\Stock;
use App\Livewire\Admin\Promotion\Promotion;
use App\Livewire\Admin\Adminproduct\Adminproductdetails;
use App\Livewire\Admin\Shipping\Shipping;


// Public routes
Route::get('/', Index::class)->name('home.index');
Route::get('/about', About::class)->name('home.about');
Route::get('/shop/{id}/{slug}', Shop::class)->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9\-]+'])->name('home.shop');
Route::get('/contact', Contact::class)->name('home.contact');
Route::get('/product/{id}/{category}/{slug}', ProductDetails::class)->name('show-product');
Route::get('/access_denied', Denied::class)->name('access.denied');


// Admin routes
Route::middleware(['auth', 'check.admin:9', 'verified'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');


   Route::get('/stock', Stock::class)->name('admin.stock.view');

   Route::get('/Promotion', Promotion::class)->name('admin.promotions.view');

   Route::get('/shipping', Shipping::class)->name('admin.shipping.view');

    //category routes
    Route::get('category_view', Category::class)->name('admin.category.view');


    //product routes
    Route::get('products_view',Adminproduct::class)->name('admin.products.view');
    Route::get('products_details/{id}', Adminproductdetails::class)->name('admin.products.details');

    // InvoicesRoutes
    Route::get('invoiceslist', Invoicelist::class)->name('admin.invoices.list');
    Route::get('invoicesview', Invoiceview::class)->name('admin.invoices.view');

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::fallback(function () {
    return view('404');
});


require __DIR__ . '/auth.php';
