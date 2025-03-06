<?php

use App\Http\Controllers\FlexPayController;
use App\Http\Controllers\MaxiNotifyPaymentController;
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
use App\Livewire\Admin\Product\ProductStore;
use App\Livewire\Admin\Product\ProductUpdate;
use App\Livewire\Admin\Promotion\Promotion;
use App\Livewire\Admin\Shipping\Shipping;
use App\Livewire\Admin\SliderManager\SliderStore;
use App\Livewire\Admin\Stock\Stock;
use App\Livewire\Cart\Cartshow;
use App\Livewire\Guest\About\About;
use App\Livewire\Guest\Commande\AboutCommend;
use App\Livewire\Guest\Contact\Contact;
use App\Livewire\Guest\Error\Page\Denied;
use App\Livewire\Guest\Home\Index;
use App\Livewire\Guest\PrivacyPolicy\PrivacyPolicy;
use App\Livewire\Guest\RefundPolicy\RefundPolicy;
use App\Livewire\Guest\Shipping\AboutShipping;
use App\Livewire\Guest\Shop\Shop;
use App\Livewire\Guest\TableChart\SizeChart;
use App\Livewire\Guest\TermsAndConditions\TermsAndConditions;
use App\Livewire\ProcessOrder\Checkout;
use App\Livewire\ProcessOrder\Confirmation;
use App\Livewire\Products\ProductDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'process'], function () {
    Route::post('/payment', [FlexPayController::class, 'handlePayment'])->name('payment');
    Route::get('/accepted/payment', \App\Livewire\Payment\Success::class)->name('accepted.payment');
    Route::get('/rejected/payment', \App\Livewire\Payment\Reject::class)->name('rejected.payment');
    Route::get('/maxi-notify/payment', [MaxiNotifyPaymentController::class, 'handlePayment'])->name('maxi-notify.payment');
});

Route::middleware(['auth', 'check.admin:9', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');

    // Management
    Route::prefix('management')->group(function () {
        Route::get('/stock', Stock::class)->name('admin.stock.view');
        Route::get('/promotion', Promotion::class)->name('admin.promotions.view');
        Route::get('/shipping', Shipping::class)->name('admin.shipping.view');
    });

    // Categories
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', Category::class)->name('list');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::get('/edit/{id}', CategoryEdit::class)->name('edit');
        Route::get('/delete/{id}', CategoryDelete::class)->name('delete');
    });

    // Invoices
    Route::prefix('invoices')->name('admin.invoices.')->group(function () {
        Route::get('/', Invoicelist::class)->name('list');
        Route::get('/{id}', Invoiceview::class)->name('view');
    });

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/Message', ContactMessage::class)->name('admin.contact.message');
    });

    // Products
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/create', ProductStore::class)->name('create');
        Route::get('/edit/{id}', ProductUpdate::class)->name('edit');
        Route::get('/delete/{id}', ProductDelete::class)->name('delete');
        Route::get('/detail/{id}', ProductDetail::class)->name('details');
        Route::get('/list', ProductList::class)->name('list');
        Route::get('/list-card', ProductListCard::class)->name('list-card');
    });

    // Sliders
    Route::prefix('slider')->name('slider.')->group(function () {

        Route::get('/slider_store', SliderStore::class)->name('store');

    });
});

// Fallback route
Route::fallback(function () {
    return view('404');
});

// Authentication routes
require __DIR__.'/auth.php';
