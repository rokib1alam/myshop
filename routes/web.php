<?php

use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


require __DIR__ . '/admin.php';
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(UserMiddleware::class);
Route::get('/frontend/product',function(){
    return view('frontend.pages.product_details');
});
//Frontend All Routs Here ------------
Route::group([], function () {
    Route::get('/', [FrontendController::class, 'index']);
});