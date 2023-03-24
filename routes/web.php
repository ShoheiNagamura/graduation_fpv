<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\Pilot\ProfileController as ProfilePilotController;

use App\Http\Controllers\ProfileController;
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

// トップページ
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// 一般ユーザー認証用ルーティング
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// パイロットユーザー用ルーティング
Route::prefix('pilot')->name('pilot.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pilot.dashboard');
    })->middleware(['auth:pilot', 'verified'])->name('dashboard');

    Route::middleware('auth:pilot')->group(function () {
        Route::get('/profile', [ProfilePilotController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfilePilotController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfilePilotController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/pilot.php';
});
