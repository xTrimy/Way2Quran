<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecitersController;
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

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get( '/surah/{surah_name}', [PagesController::class, 'surah'])->name('surah');
// Route::get('/surah/{surah_name}/reciter/{reciter?}', [PagesController::class, 'surah'])->name('surah_reciter');

// Route::get('/surah/{surah_name}/text', [PagesController::class, 'surah_text'])->name('surah_text');
// Route::get('/surah/{surah_name}/audio', [PagesController::class, 'surah_audio'])->name('surah_audio');

// Route::get('/q/{reciter}/{file_path}', [PagesController::class, 'get_file_chunks'])->name('get_file_chunks');

// Route::get('/reciters', [RecitersController::class, 'index'])->name('reciters');
// Route::get('/reciters/{reciter}', [RecitersController::class, 'show'])->name('reciters.show');

Route::prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('reciters', \App\Http\Controllers\Admin\RecitersController::class);
    Route::get('reciters/{id}/upload', [\App\Http\Controllers\Admin\SurahAudioController::class, 'upload'])->name('reciters.upload');
});