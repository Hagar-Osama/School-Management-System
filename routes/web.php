<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
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
    }
);
Route::get('/signin', [AuthController::class, 'signinPage'])->name('signinpage');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

// Route::get('/test', function() {
//     $parentAttachments = ParentAttachment::with('parent')->first();

//     $path = Storage::disk('public')->delete('parent_attachments/'. $parentAttachments->file_name);
// return $path;
// });



