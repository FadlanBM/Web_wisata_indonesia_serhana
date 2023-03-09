<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\TrevelController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SeniTariController;
use App\Http\Controllers\SeniTulisController;
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

Route::resource('/index',IndexController::class)->middleware('auth');
Route::resource('/seni_tulis', SeniTulisController::class)->except([
    'show'
])->middleware('auth');
Route::resource('/seni_tari', SeniTariController::class)->except([
    'show'
])->middleware('auth');
Route::resource('/berita', BeritaController::class)->except([
    'show'
])->middleware('auth');
Route::resource('/wisata', WisataController::class)->except([
    'show'
])->middleware('auth');
Route::resource('/travel', TrevelController::class)->except([
    'show'
])->middleware('auth');

Route::get('/seni_tulis/{id}', [SeniTulisController::class,'show']);
Route::get('/seni_tari/{id}', [SeniTariController::class,'show']);
Route::get('/berita/{id}', [BeritaController::class,'show']);
Route::get('/wisata/{id}', [WisataController::class,'show']);
Route::get('/travel/{id}', [TrevelController::class,'show']);

Route::get('/',[IndexController::class,'index']);
Route::get('/halaman_wisata',[WisataController::class,'index']);
Route::get('/halaman_seni_tari',[SeniTariController::class,'index']);
Route::get('/halaman_seni_tulis',[SeniTulisController::class,'index']);
Route::get('/halaman_berita',[BeritaController::class,'index']);
Route::get('/halaman_travel',[TrevelController::class,'index']);

Route::redirect('home', 'dashboard');
Route::get('/auth', [authController::class, 'index'])->name('login');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);
Route::get('/dashboard', function () {
    return view('dashboard.menu_utama');
})->middleware('auth');

// Route::prefix('dashboard')->group(
//     function () {
//         Route::get('/', function () {
//             return view('dashboard.menu_utama');
//         });
//     }
// );
