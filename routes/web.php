<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'predmet'], function(){
    Route::get('/index', [App\Http\Controllers\PredmetController::class, 'index'])->name('predmet-index');
    Route::post('/store', [App\Http\Controllers\PredmetController::class, 'store'])->name('predmet-store');
    Route::get('/edit/{id}', [App\Http\Controllers\PredmetController::class, 'edit'])->name('predmet-edit');
    Route::patch('/update/{id}', [App\Http\Controllers\PredmetController::class, 'update'])->name('predmet-update');
    Route::get('/delete/{id}', [App\Http\Controllers\PredmetController::class, 'delete'])->name('predmet-delete');
});
Auth::routes();

