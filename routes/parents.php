<?php

use App\Http\Controllers\Dashboards\Parents\ParentDashboardController;
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
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']],
    function () {
        Route::get('/parent/dashboard',function () {
            return view('parents.dashboard');
        })->name('parents.dashboard');

          //  Online Exams Routes
          Route::group(['prefix' => 'parents', 'as' => 'studentsOnlineExamsResults.'], function () {
            Route::get('/studentExam/result', [ParentDashboardController::class, 'showResults'])->name('show');

        });
        //student Profile Route
        Route::get('parent/student/profile', [ParentDashboardController::class, 'profileIndex'])->name('parentStudentProfile.index');

    }
);
