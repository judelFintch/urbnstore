<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Category\Category;
use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryDelete;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Invoices\Invoicelist;
use App\Livewire\Admin\Invoices\Invoiceview;
use App\Livewire\Admin\Message\ContactMessage;
use App\Livewire\Admin\Product\ProductDelete;
use App\Livewire\Admin\Product\ProductDetail;
use App\Livewire\Admin\Product\ProductList;
use App\Livewire\Admin\Product\ProductListCard;
use App\Livewire\Admin\Product\ProductPhotoUpload;
use App\Livewire\Admin\Product\ProductStore;
use App\Livewire\Admin\Product\ProductUpdate;
use App\Livewire\Admin\Promotion\Promotion;
use App\Livewire\Admin\Shipping\Shipping;
use App\Livewire\Admin\SliderManager\SliderStore;
use App\Livewire\Admin\Stock\Stock;
use App\Livewire\Admin\User\Partials\ListUser;
use App\Livewire\Admin\User\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'check.admin:9', 'verified'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/product-photo-upload/{id}', ProductPhotoUpload::class)->name('admin.product-photo-upload');

    Route::get('users/list', ListUser::class)->name('admin.user.view');
    Route::get('users/dashboard', UserDashboard::class)->name('admin.user.dashboard');

    Route::prefix('management')->group(function () {
        Route::get('/stock', Stock::class)->name('admin.stock.view');
        Route::get('/promotion', Promotion::class)->name('admin.promotions.view');
        Route::get('/shipping', Shipping::class)->name('admin.shipping.view');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', Category::class)->name('list');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::get('/edit/{id}', CategoryEdit::class)->name('edit');
        Route::get('/delete/{id}', CategoryDelete::class)->name('delete');
    });

    Route::prefix('invoices')->name('admin.invoices.')->group(function () {
        Route::get('/', Invoicelist::class)->name('list');
        Route::get('/{id}', Invoiceview::class)->name('view');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/Message', ContactMessage::class)->name('admin.contact.message');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/create', ProductStore::class)->name('create');
        Route::get('/edit/{id}', ProductUpdate::class)->name('edit');
        Route::get('/delete/{id}', ProductDelete::class)->name('delete');
        Route::get('/detail/{id}', ProductDetail::class)->name('details');
        Route::get('/list', ProductList::class)->name('list');
        Route::get('/list-card', ProductListCard::class)->name('list-card');
    });

    Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/slider_store', SliderStore::class)->name('store');
    });
});

