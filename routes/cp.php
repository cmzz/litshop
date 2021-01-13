<?php

use LitShop\CP\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::name('cp.')->group(function() {
    Route::get('login', Login::class)->name('auth.login');
});
