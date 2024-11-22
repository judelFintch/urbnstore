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
use App\Livewire\Admin\Products\ProductsList;
use App\Livewire\Admin\Products\Productsview;
use App\Livewire\Guest\Error\Page\Denied;

// Public routes
Route::get('/', Index::class)->name('home.index');
Route::get('/about', About::class)->name('home.about');
Route::get('/shop/{id}/{slug}', Shop::class)->name('home.shop');
Route::get('/contact', Contact::class)->name('home.contact');
Route::get('/product/{id}/{category}/{slug}', ProductDetails::class)->name('show-product');
Route::get('/denied', Denied::class)->name('access.denied');


// Admin routes
Route::middleware(['auth', 'check.admin:9', 'verified'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');

    // ProductsRoutes
    Route::get('productslist', ProductsList::class)->name('admin.products.list');
    Route::get('productsview', Productsview::class)->name('admin.products.view');

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




require __DIR__ . '/auth.php';
