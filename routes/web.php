<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Guest\Home\Index;
use App\Livewire\Products\ProductDetails;
use App\Livewire\Guest\About\About;
use App\Livewire\Guest\Shop\Shop;
use App\Livewire\Guest\Contact\Contact;



Route::get('/', Index::class)->name('home.index');
Route::get('/about', About::class)->name('home.about');
Route::get('/shop', Shop::class)->name('home.shop');
Route::get('/contact', Contact::class)->name('home.contact');
Route::get('/product/{id}/{category}/{slug}', ProductDetails::class)->name('show-product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
