<?php

use App\Http\Controllers\Dashboards\Teachers\OnlineClassController;
use App\Http\Controllers\Dashboards\Teachers\TeacherDashboardController;
use App\Http\Controllers\Dashboards\Teachers\QuizController;
use App\Http\Controllers\Dashboards\Teachers\TeacherProfileController;
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
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']],
    function () {
        Route::group(['namespace' => 'Dashboards\Teachers'], function () {

            Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'teacherDashboard'])->name('teacher.dashboard');
            Route::get('teacherDashboard/studentsName', [TeacherDashboardController::class, 'getStudentNames'])->name('students.names');
            Route::get('teacherDashboard/sections', [TeacherDashboardController::class, 'showSections'])->name('sections.show');
            Route::post('/attendance/store', [TeacherDashboardController::class, 'store'])->name('attendance.store');
            Route::get('attendance/reports', [TeacherDashboardController::class, 'getAttendanceReports'])->name('attendance.report');
            Route::post('attendance/search', [TeacherDashboardController::class, 'searchAttendance'])->name('attendance.search');

            //  Online Exams Routes
            Route::group(['prefix' => 'onlineExams', 'as' => 'onlineExams.'], function () {
                Route::get('/teacher', [QuizController::class, 'index'])->name('index');
                Route::get('/teacher/create', [QuizController::class, 'create'])->name('create');
                Route::post('/teacher/store', [QuizController::class, 'store'])->name('store');
                Route::get('/teacher/edit/{onlineExamId}', [QuizController::class, 'edit'])->name('edit');
                Route::put('/teacher/update', [QuizController::class, 'update'])->name('update');
                Route::delete('/teacher/delete', [QuizController::class, 'destroy'])->name('destroy');
                //students who took te exam route
                Route::get('teacher/students/examsResults/{onlineExamId}', [QuizController::class, 'showScores'])->name('scores.show');
                Route::post('teacher/student/retakeExam/{onlineExamId}', [QuizController::class, 'retakeExam'])->name('retakeExam');
            });
            ///  Questions Route
            Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
                Route::get('/teacher/show/{onlineExamId}', [QuizController::class, 'showQuestions'])->name('show');
                Route::get('/teacher', [TeacherQuestionController::class, 'index'])->name('index');
                Route::get('/teacher/create/{onlineExamId}', [TeacherQuestionController::class, 'create'])->name('create');
                Route::post('/teacher/store', [TeacherQuestionController::class, 'store'])->name('store');
                Route::get('/teacher/edit/{questionId}', [TeacherQuestionController::class, 'edit'])->name('edit');
                Route::put('/teacher/update', [TeacherQuestionController::class, 'update'])->name('update');
                Route::delete('/teacher/delete', [TeacherQuestionController::class, 'destroy'])->name('destroy');
            });
            //  online Meetings Routes (zoom integeration)
            Route::group(['prefix' => 'zoom', 'as' => 'zoom.'], function () {
                Route::get('/', [OnlineClassController::class, 'index'])->name('index');
                Route::get('/create', [OnlineClassController::class, 'create'])->name('create');
                Route::post('/store', [OnlineClassController::class, 'store'])->name('store');
                Route::delete('/delete', [OnlineClassController::class, 'destroy'])->name('destroy');
            });
            //  multiple Meetings Routes
            Route::group(['prefix' => 'indirectZoom', 'as' => 'indirectZoom.'], function () {
                Route::get('/multipleMeetings/create', [OnlineClassController::class, 'makeMeeting'])->name('makeMeeting');
                Route::post('/multipleMeetings/store', [OnlineClassController::class, 'storeMeeting'])->name('storeMeeting');
            });
            //teacher profile routes
            Route::get('teacher/profile', [TeacherProfileController::class, 'index'])->name('profile.index');
            Route::put('teacher/profile/update/{id}', [TeacherProfileController::class, 'updateProfile'])->name('profile.update');
        });
    }
);
