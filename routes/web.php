<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;


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

// Rute untuk menampilkan detail anime
Route::get('/', [AnimeController::class, 'index']);
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');
Route::get('/anime/season/{year}/{season}', [AnimeController::class, 'showSeason'])->name('anime.season');

