<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/guest.php';
require __DIR__.'/admin.php';

// Fallback route
Route::fallback(function () {
    return view('404');
});

require __DIR__.'/auth.php';
