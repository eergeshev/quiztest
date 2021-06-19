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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'predmet'], function(){
        Route::get('/index', [App\Http\Controllers\PredmetController::class, 'index'])->name('predmet-index');
        Route::post('/store', [App\Http\Controllers\PredmetController::class, 'store'])->name('predmet-store');
        Route::get('/show/{id}', [App\Http\Controllers\PredmetController::class, 'show'])->name('predmet-show');
        Route::post('/test/{id}', [App\Http\Controllers\PredmetController::class, 'test'])->name('predmet-test');
        Route::get('/result/{id}', [App\Http\Controllers\PredmetController::class, 'quizresult'])->name('predmet-result');
        Route::get('/edit/{id}', [App\Http\Controllers\PredmetController::class, 'edit'])->name('predmet-edit');
        Route::patch('/update/{id}', [App\Http\Controllers\PredmetController::class, 'update'])->name('predmet-update');
        Route::get('/delete/{id}', [App\Http\Controllers\PredmetController::class, 'delete'])->name('predmet-delete');
        Route::get('/result/delete/{id}', [App\Http\Controllers\PredmetController::class, 'resultdelete'])->name('result-delete');
    });

    Route::group(['prefix'=>'question'], function(){
        Route::get('/index', [App\Http\Controllers\QuestionController::class, 'index'])->name('question-index');
        Route::get('/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('question-create');
        Route::post('/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('question-store');
        Route::get('/edit/{id}', [App\Http\Controllers\QuestionController::class, 'edit'])->name('question-edit');
        Route::patch('/update/{id}', [App\Http\Controllers\QuestionController::class, 'update'])->name('question-update');
        Route::get('/delete/{id}', [App\Http\Controllers\QuestionController::class, 'delete'])->name('question-delete');
    });

    Route::group(['prefix'=>'student'], function(){
        Route::get('/index', [App\Http\Controllers\StudentController::class, 'index'])->name('student-index');
        Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student-create');
        Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student-store');
        Route::get('/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student-show');
        Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student-edit');
        Route::patch('/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student-update');
        Route::get('/result', [App\Http\Controllers\StudentController::class, 'studentresult'])->name('student-studentresult');
    });

});





