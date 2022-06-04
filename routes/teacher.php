<?php


use App\Http\Controllers\Dashboards\TeacherDashboardController;
use App\Models\Attendance;
use Illuminate\Http\Request;
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
        Route::group(['namespace' => 'dashboards'], function () {

            Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
            Route::get('teacherDashboard/studentsName', [TeacherDashboardController::class, 'getStudentNames'])->name('students.names');
            Route::get('teacherDashboard/sections', [TeacherDashboardController::class, 'showSections'])->name('sections.show');
            Route::post('/attendance/store', [TeacherDashboardController::class, 'store'])->name('attendance.store');
            Route::post('attendances/update', [TeacherDashboardController::class, 'update'])->name('attendances.update');
        });


    }
);
