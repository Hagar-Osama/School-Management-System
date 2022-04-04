<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']],
    function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/signout', [AuthController::class, 'signout'])->name('signout');
        ///Grades Routes///
        Route::group(['prefix' => 'grades'], function(){
            Route::get('/', [GradeController::class, 'index'])->name('grades.index');
            Route::post('/store', [GradeController::class, 'store'])->name('grades.store');
            Route::put('/update', [GradeController::class, 'update'])->name('grades.update');
            Route::delete('/delete', [GradeController::class, 'destroy'])->name('grades.destroy');
        });
        ///Classes Routes///
        Route::group(['prefix' => 'classes'], function(){
            Route::get('/', [ClassController::class, 'index'])->name('classes.index');
            Route::post('/store', [ClassController::class, 'store'])->name('classes.store');
            Route::put('/update', [ClassController::class, 'update'])->name('classes.update');
            Route::delete('/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
        });
    }
);
Route::get('/signin', [AuthController::class, 'signinPage'])->name('signinpage');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');



