<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;

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

Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('home.change-language');

    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'db'], function () {
        Route::get('/{dbName}', [DBController::class, 'show'])->name('db.show');

        Route::get('/{dbName}/{tableName}', [TableController::class, 'show'])->name('table.show');
        Route::get('/{dbName}/{tableName}/structure', [TableController::class, 'structure'])->name('table.structure');
    });
});
