<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\Pilot\ProfileController as ProfilePilotController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShootingPlanController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PilotListController;


// トップページ
Route::get('/', function () {
    return view('top');
});



// 一般ユーザー認証用ルーティング ログイン時のみアクセスできる
Route::middleware('auth')->group(function () {
    Route::get('/user_dashboard', function () {
        return view('user_dashboard');
    })->middleware(['auth', 'verified'])->name('user_dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //パイロットリスト
    Route::resource('pilot_list', PilotListController::class);
});

require __DIR__ . '/auth.php';



// パイロットユーザー用ルーティング ログイン時のみアクセスできる
Route::prefix('pilot')->name('pilot.')->group(function () {
    Route::get('/pilot_dashboard', function () {
        return view('pilot.pilot_dashboard');
    })->middleware(['auth:pilot', 'verified'])->name('pilot_dashboard');

    Route::middleware('auth:pilot')->group(function () {
        Route::get('/profile', [ProfilePilotController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfilePilotController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfilePilotController::class, 'destroy'])->name('profile.destroy');

        //パイロットリスト
        Route::resource('pilot_list', PilotListController::class);

        //発注用プランのルーティング
        Route::resource('shooting_plan', ShootingPlanController::class);

        // ポートフォリオ用
        Route::resource('portfolio', PortfolioController::class);
    });



    require __DIR__ . '/pilot.php';
});
