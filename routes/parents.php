<?php

use App\Http\Controllers\Dashboards\Parents\ParentDashboardController;
use App\Models\Student;
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
            $children = Student::where('parent_id', auth()->user()->id)->get();
            return view('parents.dashboard', compact('children'));
        })->name('parents.dashboard');

          //children route
          Route::get('parent/children', [ParentDashboardController::class, 'index'])->name('children.index');

          //  Online Exams results Routes
          Route::group(['prefix' => 'parents', 'as' => 'studentsOnlineExamsResults.'], function () {
            Route::get('/studentExam/result/{studentId}', [ParentDashboardController::class, 'showResults'])->name('show');

        });
        //student Profile Route
        Route::get('parent/student/profile', [ParentDashboardController::class, 'profileIndex'])->name('parentStudentProfile.index');




    }
);
