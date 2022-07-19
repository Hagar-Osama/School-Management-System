<?php

use App\Http\Controllers\Dashboards\Students\StudentExamController;
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



Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']],
    function () {
        Route::get('/student/dashboard',function () {
            return view('Students.Dashboard.dashboard');
        })->name('students.dashboard');


    Route::group(['namespace' => 'Dashboards\Students'], function() {

        //  Online Exams Routes
        Route::group(['prefix' => 'onlineExams', 'as' => 'studentsOnlineExams.'], function () {
            Route::get('/studentExam', [StudentExamController::class, 'index'])->name('index');
            Route::get('/studentExam/show/{onlineExamId}', [StudentExamController::class, 'show'])->name('show');

        });

    });

    }

);
