<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileDesaController;
use App\Http\Controllers\ProfileAparaturController;
use App\Http\Controllers\ProfileBpdController;
use App\Http\Controllers\QuestionController;
use App\Models\ProfileDesa;
use Illuminate\Support\Facades\Route;

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


// admin route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        $data = ProfileDesa::all();

        // profile
        $cek_nama = ProfileDesa::count();
        if ($cek_nama > 0) {
            $name = ProfileDesa::first();
            $name = $name->name;
        } else {
            $name = 'Spd Perjuangan';
        }

        $cek_logo = ProfileDesa::count();
        if ($cek_logo > 0) {
            $logo = ProfileDesa::first();
            $logo = $logo->picture;
        } else {
            $logo = '';
        }

        return view('dashboard', [
            'title' => 'Dashboard',
            'name' => $name,
            'logo' => $logo
        ]);
    })->name('dashboard');
    Route::prefix('admin')->group(function () {
        // Route profile desa
        Route::resource('/profile', ProfileDesaController::class)->except('show');

        // route berita
        Route::resource('/news', NewsController::class)->except('show');

        // Route profile aparatur
        Route::resource('/profile-aparatur', ProfileAparaturController::class)->except('show');

        // Route profile bpd
        Route::resource('/profile-bpd', ProfileBpdController::class)->except('show');

        // route prestasi
        Route::resource('/achievement', AchievementController::class)->except('show');

        // route pertanyaan
        Route::resource('/question', QuestionController::class)->except('show');
        
        
    });
    Route::get('getSlug', [NewsController::class, 'getSlug']);
});


require __DIR__ . '/auth.php';
