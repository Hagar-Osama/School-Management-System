<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Dashboards\Teachers\OnlineClassController;
use App\Http\Controllers\Dashboards\Teachers\TeacherDashboardController;
use App\Http\Controllers\Dashboards\Teachers\QuizController;
use App\Http\Controllers\Dashboards\Teachers\TeacherQuestionController;
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
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
       
            //classes and section Ajax routes
            Route::get('students/classes/{gradeId}', [AjaxController::class, 'getClasses']);
            Route::get('students/sections/{classId}', [AjaxController::class, 'getSections']);
           


       
    }
);
