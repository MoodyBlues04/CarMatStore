<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\IndexController;

Route::get('/', IndexController::class . '@index')->name('index');
Route::get('/product', IndexController::class . '@product')->name('product');

Route::get('/about', IndexController::class . '@about')->name('about');
Route::post('/consultation', IndexController::class . '@consultation')->name('consultation');
Route::get('/contacts', IndexController::class . '@contacts')->name('contacts');
Route::get('/privacy_policy', IndexController::class . '@privacyPolicy')->name('privacy_policy');
