<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FlexPayController;
use App\Http\Controllers\MaxiNotifyPaymentController;
use App\Livewire\Guest\Home\Index;
use App\Livewire\Guest\About\About;
use App\Livewire\Guest\Shop\Shop;
use App\Livewire\Guest\Contact\Contact;
use App\Livewire\Guest\Error\Page\Denied;
use App\Livewire\Cart\Cartshow;
use App\Livewire\Guest\Commande\AboutCommend;
use App\Livewire\Guest\Shipping\AboutShipping;
use App\Livewire\Guest\PrivacyPolicy\PrivacyPolicy;
use App\Livewire\Guest\TermsAndConditions\TermsAndConditions;
use App\Livewire\Guest\RefundPolicy\RefundPolicy;
use App\Livewire\Guest\TableChart\SizeChart;
use App\Livewire\ProcessOrder\Checkout;
use App\Livewire\ProcessOrder\Confirmation;
use App\Livewire\Products\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::get('/confirmation', Confirmation::class)->name('order.confirm');
Route::get('/checkout', Checkout::class)->name('order.checkout');
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
    Route::get('/faq', Denied::class)->name('help.faq');

    Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
    Route::get('/terms-and-conditions', TermsAndConditions::class)->name('terms-and-conditions');
    Route::get('/refund-policy', RefundPolicy::class)->name('refund-policy');
    Route::get('/size-chart', SizeChart::class)->name('size-chart');
});

Route::group(['prefix' => 'process'], function () {
    Route::post('/process/payment', [PaymentController::class, 'handlePayment'])->name('process.payment');
    Route::get('/accepted/payment', \App\Livewire\Payment\Success::class)->name('accepted.payment');
    Route::get('/rejected/payment', \App\Livewire\Payment\Reject::class)->name('rejected.payment');
    Route::get('/maxi-notify/payment', [MaxiNotifyPaymentController::class, 'handlePayment'])->name('maxi-notify.payment');
});

