<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], __DIR__ . '/web/auth.php');
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(__DIR__ . '/web/admin.php');
Route::prefix('user')
    ->as('user.')
    ->middleware(['auth', 'verified', 'user'])
    ->group(__DIR__ . '/web/user.php');

Route::as('public.')->group(function () {
//    TODO rewrite all public (to controller)
    Route::get('/', function () {
        if (!auth()->guest() && auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        } else {
            $articles = \App\Models\Article::get()->all();
            return view('public.index', compact('articles'));
        }
    })->name('index');
    Route::view('/product', 'public.product')->name('product');
});
