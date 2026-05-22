<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'index']);

Route::get('/', fn() => redirect()->route('utama'));
Route::get('/utama',   [HomeController::class, 'home'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
 