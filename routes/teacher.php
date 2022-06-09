<?php

use App\Http\Controllers\Dashboards\Teachers\QuestionController;
use App\Http\Controllers\Dashboards\Teachers\TeacherDashboardController;
use App\Http\Controllers\Dashboards\Teachers\QuizController;
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
        Route::group(['namespace' => 'Dashboards\Teachers'], function () {

            Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
            Route::get('teacherDashboard/studentsName', [TeacherDashboardController::class, 'getStudentNames'])->name('students.names');
            Route::get('teacherDashboard/sections', [TeacherDashboardController::class, 'showSections'])->name('sections.show');
            Route::post('/attendance/store', [TeacherDashboardController::class, 'store'])->name('attendance.store');
            Route::get('attendance/reports', [TeacherDashboardController::class, 'getAttendanceReports'])->name('attendance.report');
            Route::post('attendance/search', [TeacherDashboardController::class, 'searchAttendance'])->name('attendance.search');
            //classes and section Ajax routes
            Route::get('students/classes/{gradeId}', [QuizController::class, 'getClasses']);
            Route::get('students/sections/{classId}', [QuizController::class, 'getSections']);
            //  Online Exams Routes
            Route::group(['prefix' => 'onlineExams', 'as' => 'onlineExams.'], function () {
                Route::get('/', [QuizController::class, 'index'])->name('index');
                Route::get('/create', [QuizController::class, 'create'])->name('create');
                Route::post('/store', [QuizController::class, 'store'])->name('store');
                Route::get('/edit/{onlineExamId}', [QuizController::class, 'edit'])->name('edit');
                Route::put('/update', [QuizController::class, 'update'])->name('update');
                Route::delete('/delete', [QuizController::class, 'destroy'])->name('destroy');
               
            });
            Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
                Route::get('/show/questions/{onlineExamId}', [QuizController::class, 'showQuestions'])->name('show');
                Route::get('/', [QuestionController::class, 'index'])->name('index');
                Route::get('/create/{onlineExamId}', [QuestionController::class, 'create'])->name('create');
                Route::post('/store', [QuestionController::class, 'store'])->name('store');
                Route::get('/edit/{questionId}', [QuestionController::class, 'edit'])->name('edit');
                Route::put('/update', [QuestionController::class, 'update'])->name('update');
                Route::delete('/delete', [QuestionController::class, 'destroy'])->name('destroy');

            });


        });
    }
);
