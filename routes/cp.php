<?php

use LitShop\CP\Auth\Login;
use Illuminate\Support\Facades\Route;
use LitShop\CP\Brand\BrandManage;
use LitShop\CP\Category\CategoryManage;
use LitShop\CP\Dashboard;
use LitShop\CP\Goods\Create;
use LitShop\CP\Goods\GoodsManage;

Route::name('cp.')->group(function() {
    Route::get('login', Login::class)->name('auth.login');

    Route::middleware('cp.auth')->group(function () {
        Route::get('/', Dashboard::class)->name('index');

        // goods route
        Route::get('/goods', GoodsManage::class)->name('goods.manage');
        Route::get('/goods/new', Create::class)->name('goods.new');
        Route::get('/goods/category', CategoryManage::class)->name('goods.category');
        Route::get('/goods/category/new', \LitShop\CP\Category\Create::class)->name('goods.category.new');
        Route::get('/goods/brand', BrandManage::class)->name('goods.brand');
        Route::get('/goods/brand/new', \LitShop\CP\Brand\Create::class)->name('goods.brand.new');

    });
});

