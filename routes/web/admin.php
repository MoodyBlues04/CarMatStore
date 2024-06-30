<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GoogleSheetsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\MatTariffController;

Route::view('/', 'admin.index')->name('index');

Route::get('/settings', SettingsController::class . '@index')
    ->name('settings.index');
Route::patch('/settings/{settings}', SettingsController::class . '@update')
    ->name('settings.update');

Route::resource('article', ArticleController::class)->except(['show']);
Route::resource('gallery', GalleryController::class)->except(['show', 'edit', 'update']);
Route::resource('brand', BrandController::class)->only(['index', 'destroy']);
Route::resource('tariff', MatTariffController::class)->only(['index', 'create', 'store']);

Route::get('/load_sheets_data', GoogleSheetsController::class . '@loadSheetsData')
    ->name('load_sheets_data');
