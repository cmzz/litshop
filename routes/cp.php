<?php

use LitShop\CP\Auth\Login;
use Illuminate\Support\Facades\Route;
use LitShop\CP\Auth\Logout;
use LitShop\CP\Dashboard;

Route::name('cp.')->group(function() {
    Route::get('login', Login::class)->name('auth.login');


    Route::middleware('cp.auth')->group(function () {
        Route::get('/', Dashboard::class)->name('index');
    });
});

