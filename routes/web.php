<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduatedStudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UpgradeStudentController;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        Route::group(['prefix' => 'grades'], function() {
            Route::get('/', [GradeController::class, 'index'])->name('grades.index');
            Route::post('/store', [GradeController::class, 'store'])->name('grades.store');
            Route::put('/update', [GradeController::class, 'update'])->name('grades.update');
            Route::delete('/delete', [GradeController::class, 'destroy'])->name('grades.destroy');
        });
        ///Classes Routes///
        Route::group(['prefix' => 'classes'], function() {
            Route::get('/', [ClassController::class, 'index'])->name('classes.index');
            Route::post('/store', [ClassController::class, 'store'])->name('classes.store');
            Route::put('/update', [ClassController::class, 'update'])->name('classes.update');
            Route::delete('/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
            Route::delete('/deleteAll', [ClassController::class, 'deleteAll'])->name('classes.deleteAll');
            Route::post('/filter', [ClassController::class, 'filterClasses'])->name('classes.filter');
        });
        ////Sections Routes///
        Route::group(['prefix' => 'sections'], function() {
            Route::get('/', [SectionController::class, 'index'])->name('sections.index');
            Route::get('/classes/{gradeId}', [SectionController::class, 'getClasses']);
            Route::post('/store', [SectionController::class, 'store'])->name('section.store');
            Route::put('/update', [SectionController::class, 'update'])->name('section.update');
            Route::delete('/delete', [SectionController::class, 'destroy'])->name('section.destroy');
        });
        /////Parents Routes/////
        Route::view('add-parent', 'livewire.showForm');
        /////Teachers Route//////
        Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function() {
            Route::get('/', [TeacherController::class, 'index'])->name('index');
            Route::get('/edit/{id}',[TeacherController::class, 'edit'])->name('edit');
            Route::get('/create',[TeacherController::class, 'create'])->name('create');
            Route::post('/store', [TeacherController::class, 'store'])->name('store');
            Route::put('/update', [TeacherController::class, 'update'])->name('update');
            Route::delete('/delete', [TeacherController::class, 'destroy'])->name('destroy');
        });
        //////Students Routes/////
        Route::group(['prefix' => 'students', 'as' => 'students.'], function() {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/classes/{gradeId}', [StudentController::class, 'getClasses']);
            Route::get('/sections/{classId}', [StudentController::class, 'getSections']);
            Route::get('/create',[StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/show/{id}',[StudentController::class, 'show'])->name('show');
            Route::get('/edit/{id}',[StudentController::class, 'edit'])->name('edit');
            Route::put('/update', [StudentController::class, 'update'])->name('update');
            Route::delete('/delete', [StudentController::class, 'destroy'])->name('destroy');
            Route::post('upload/attachments', [StudentController::class, 'updateFiles'])->name('updateFiles');
            Route::get('download/attachments/{studentName}/{fileName}', [StudentController::class, 'downloadAttachments'])->name('downloadAttachment');
            Route::delete('delete/attachments', [StudentController::class, 'deleteAttachments'])->name('deleteAttachments');
        });
        //Upgraded Students Routes
        Route::group(['prefix' => 'upgradedStudents', 'as' => 'upgradedStudents.'], function() {
            Route::get('/', [UpgradeStudentController::class, 'index'])->name('index');
            Route::get('/create', [UpgradeStudentController::class, 'create'])->name('create');
            Route::post('/store', [UpgradeStudentController::class, 'store'])->name('store');
            Route::post('/undoChanges', [UpgradeStudentController::class, 'undoChanges'])->name('undoChanges');
            Route::delete('/softDelete/upgradedStudents', [UpgradeStudentController::class, 'destroy'])->name('destroy');

        });
         //graduated Students Routes
         Route::group(['prefix' => 'graduatedStudents', 'as' => 'graduatedStudents.'], function() {
            Route::get('/', [GraduatedStudentController::class, 'index'])->name('index');
            Route::get('/create', [GraduatedStudentController::class, 'create'])->name('create');
            Route::post('/softDelete', [GraduatedStudentController::class, 'graduateStudent'])->name('delete');
            Route::post('/unarchiveStudent', [GraduatedStudentController::class, 'unarchiveStudent'])->name('restore');
            Route::delete('/delete/graduatedStudent', [GraduatedStudentController::class, 'destroy'])->name('destroy');
        });
        //  Fees Routes
        Route::group(['prefix' => 'fees', 'as' => 'fees.'], function() {
            Route::get('/', [FeeController::class, 'index'])->name('index');
            Route::get('/create', [FeeController::class, 'create'])->name('create');
            Route::post('/store', [FeeController::class, 'store'])->name('store');
            Route::get('/show/{feeId}', [FeeController::class, 'show'])->name('show');
            Route::get('/edit/{feeId}', [FeeController::class, 'edit'])->name('edit');
            Route::put('/update', [FeeController::class, 'update'])->name('update');
            Route::delete('/delete', [FeeController::class, 'destroy'])->name('destroy');
        });
            //  Fees Invoices Routes
            Route::group(['prefix' => 'feesInvoices', 'as' => 'feesInvoices.'], function() {
                Route::get('/', [FeeInvoiceController::class, 'index'])->name('index');
                Route::get('/create/{studentId}', [FeeInvoiceController::class, 'create'])->name('create');
                Route::get('/{feeId}',[FeeInvoiceController::class, 'getAmount']);
                Route::post('/store', [FeeInvoiceController::class, 'store'])->name('store');

            });
               //  Student Account Routes
               Route::group(['prefix' => 'studentAccount', 'as' => 'studentAccount.'], function() {
                Route::get('/', [StudentAccountController::class, 'index'])->name('index');
                Route::get('/create', [StudentAccountController::class, 'create'])->name('create');
                Route::post('/store', [StudentAccountController::class, 'store'])->name('store');
                Route::get('/edit/{studentAccountId}', [StudentAccountController::class, 'edit'])->name('edit');
                Route::put('/update', [StudentAccountController::class, 'update'])->name('update');
                Route::delete('/delete', [StudentAccountController::class, 'destroy'])->name('destroy');
            });
    }
);
Route::get('/signin', [AuthController::class, 'signinPage'])->name('signinpage');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');




