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

// Public routes
Route::get('/', Index::class)->name('home.index');
Route::get('/about', About::class)->name('home.about');
Route::get('/shop', Shop::class)->name('home.shop');
Route::get('/contact', Contact::class)->name('home.contact');
Route::get('/product/{id}/{category}/{slug}', ProductDetails::class)->name('show-product');

// Admin routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
