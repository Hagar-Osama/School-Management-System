<?php


use App\Http\Controllers\Dashboards\TeacherDashboardController;
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
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']],
    function () {
        Route::group(['namespace' => 'dashboards'], function (){

            Route::get('/teacher/dashboard',[TeacherDashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
            Route::get('teacherDashboard/studentsName', [TeacherDashboardController::class, 'getStudentNames'])->name('students.names');
        });


    }
);
