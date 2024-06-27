<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\PasswordResetController;

Route::controller(AuthController::class)->as('auth.')->group(function() {
    Route::get('/register', 'registerPage')->name('register_page');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginPage')->name('login_page');
    Route::post('/login', 'login')->name('login');
    Route::match(['GET', 'POST'], '/logout', 'logout')->name('logout');
});

Route::controller(PasswordResetController::class)->as('password.')->group(function() {
    Route::get('/forgot-password', 'forgotPassword')->name('request');
    Route::post('/forgot-password', 'resetEmail')->name('email');
    Route::get('/reset-password/{token}', 'reset')->name('reset');
    Route::post('/reset-password', 'update')->name('update');
});

Route::group(['prefix' => 'email', 'as' => 'verification.'], function() {
    Route::get('/verify', EmailVerifyController::class . '@notice')->name('notice');
    Route::get('/verify/{id}/{hash}', EmailVerifyController::class . '@verify')->name('verify');
    Route::post('/resend', EmailVerifyController::class . '@resend')->name('resend');
});
