<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\IndexController;
use App\Http\Controllers\Public\MatController;

Route::get('/', IndexController::class . '@index')->name('index');

Route::get('/about', IndexController::class . '@about')->name('about');
Route::post('/consultation', IndexController::class . '@consultation')->name('consultation');
Route::get('/contacts', IndexController::class . '@contacts')->name('contacts');
Route::get('/privacy_policy', IndexController::class . '@privacyPolicy')->name('privacy_policy');

Route::get('/mat/{mat}', MatController::class . '@show')->name('mat.show');
