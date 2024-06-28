<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GoogleSheetsController;
use \App\Http\Controllers\Admin\SettingsController;

Route::view('/', 'admin.index')->name('index');

Route::get('/settings', SettingsController::class . '@index')
    ->name('settings.index');
Route::patch('/settings/{settings}', SettingsController::class . '@update')
    ->name('settings.update');

Route::get('/load_sheets_data', GoogleSheetsController::class . '@loadSheetsData')
    ->name('load_sheets_data');
