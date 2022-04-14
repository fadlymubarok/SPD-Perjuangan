<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PositionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth'])->name('dashboard');

// admin route
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/account', [UserController::class, 'index']);
        Route::get('/account/{user}/edit', [UserController::class, 'edit']);
        Route::put('/account/{user}', [UserController::class, 'update']);
        Route::resource('/position', PositionController::class)->except('show');
    });
});

// petugas route
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('petugas')->group(function () {
        // route keuangan
        Route::resource('/keuangan', FinanceController::class)->except('show');

        // route berita
        Route::resource('/berita', NewsController::class)->except('show');
    });
});
require __DIR__ . '/auth.php';
