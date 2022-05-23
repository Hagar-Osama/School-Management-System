<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduatedStudentController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OnlineExamController;
use App\Http\Controllers\OnlineMeetingController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRefundController;
use App\Http\Controllers\SubjectController;
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
        Route::group(['prefix' => 'grades'], function () {
            Route::get('/', [GradeController::class, 'index'])->name('grades.index');
            Route::post('/store', [GradeController::class, 'store'])->name('grades.store');
            Route::put('/update', [GradeController::class, 'update'])->name('grades.update');
            Route::delete('/delete', [GradeController::class, 'destroy'])->name('grades.destroy');
        });
        ///Classes Routes///
        Route::group(['prefix' => 'classes'], function () {
            Route::get('/', [ClassController::class, 'index'])->name('classes.index');
            Route::post('/store', [ClassController::class, 'store'])->name('classes.store');
            Route::put('/update', [ClassController::class, 'update'])->name('classes.update');
            Route::delete('/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
            Route::delete('/deleteAll', [ClassController::class, 'deleteAll'])->name('classes.deleteAll');
            Route::post('/filter', [ClassController::class, 'filterClasses'])->name('classes.filter');
        });
        ////Sections Routes///
        Route::group(['prefix' => 'sections'], function () {
            Route::get('/', [SectionController::class, 'index'])->name('sections.index');
            Route::get('/classes/{gradeId}', [SectionController::class, 'getClasses']);
            Route::post('/store', [SectionController::class, 'store'])->name('section.store');
            Route::put('/update', [SectionController::class, 'update'])->name('section.update');
            Route::delete('/delete', [SectionController::class, 'destroy'])->name('section.destroy');
        });
        /////Parents Routes/////
        Route::view('add-parent', 'livewire.showForm');
        /////Teachers Route//////
        Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function () {
            Route::get('/', [TeacherController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
            Route::get('/create', [TeacherController::class, 'create'])->name('create');
            Route::post('/store', [TeacherController::class, 'store'])->name('store');
            Route::put('/update', [TeacherController::class, 'update'])->name('update');
            Route::delete('/delete', [TeacherController::class, 'destroy'])->name('destroy');
        });
        //////Students Routes/////
        Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/classes/{gradeId}', [StudentController::class, 'getClasses']);
            Route::get('/sections/{classId}', [StudentController::class, 'getSections']);
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::put('/update', [StudentController::class, 'update'])->name('update');
            Route::delete('/delete', [StudentController::class, 'destroy'])->name('destroy');
            Route::post('upload/attachments', [StudentController::class, 'updateFiles'])->name('updateFiles');
            Route::get('download/attachments/{studentName}/{fileName}', [StudentController::class, 'downloadAttachments'])->name('downloadAttachment');
            Route::delete('delete/attachments', [StudentController::class, 'deleteAttachments'])->name('deleteAttachments');
        });
        //Upgraded Students Routes
        Route::group(['prefix' => 'upgradedStudents', 'as' => 'upgradedStudents.'], function () {
            Route::get('/', [UpgradeStudentController::class, 'index'])->name('index');
            Route::get('/create', [UpgradeStudentController::class, 'create'])->name('create');
            Route::post('/store', [UpgradeStudentController::class, 'store'])->name('store');
            Route::post('/undoChanges', [UpgradeStudentController::class, 'undoChanges'])->name('undoChanges');
            Route::delete('/softDelete/upgradedStudents', [UpgradeStudentController::class, 'destroy'])->name('destroy');
        });
        //graduated Students Routes
        Route::group(['prefix' => 'graduatedStudents', 'as' => 'graduatedStudents.'], function () {
            Route::get('/', [GraduatedStudentController::class, 'index'])->name('index');
            Route::get('/create', [GraduatedStudentController::class, 'create'])->name('create');
            Route::post('/softDelete', [GraduatedStudentController::class, 'graduateStudent'])->name('delete');
            Route::post('/unarchiveStudent', [GraduatedStudentController::class, 'unarchiveStudent'])->name('restore');
            Route::delete('/delete/graduatedStudent', [GraduatedStudentController::class, 'destroy'])->name('destroy');
        });
        //  Fees Routes
        Route::group(['prefix' => 'fees', 'as' => 'fees.'], function () {
            Route::get('/', [FeeController::class, 'index'])->name('index');
            Route::get('/create', [FeeController::class, 'create'])->name('create');
            Route::post('/store', [FeeController::class, 'store'])->name('store');
            Route::get('/show/{feeId}', [FeeController::class, 'show'])->name('show');
            Route::get('/edit/{feeId}', [FeeController::class, 'edit'])->name('edit');
            Route::put('/update', [FeeController::class, 'update'])->name('update');
            Route::delete('/delete', [FeeController::class, 'destroy'])->name('destroy');
        });
        //  Fees Invoices Routes
        Route::group(['prefix' => 'feesInvoices', 'as' => 'feesInvoices.'], function () {
            Route::get('/', [FeeInvoiceController::class, 'index'])->name('index');
            Route::get('/create/{studentId}', [FeeInvoiceController::class, 'create'])->name('create');
            // Route::get('/{feeId}',[FeeInvoiceController::class, 'getAmount']);
            Route::post('/store', [FeeInvoiceController::class, 'store'])->name('store');
            Route::get('/edit/{feeInvoiceId}', [FeeInvoiceController::class, 'edit'])->name('edit');
            Route::put('/update', [FeeInvoiceController::class, 'update'])->name('update');
            Route::delete('/delete', [FeeInvoiceController::class, 'destroy'])->name('destroy');
        });
        //  Student Account Routes
        Route::group(['prefix' => 'studentAccount', 'as' => 'studentAccount.'], function () {
            Route::get('/', [StudentAccountController::class, 'index'])->name('index');
            Route::get('/create', [StudentAccountController::class, 'create'])->name('create');
            Route::post('/store', [StudentAccountController::class, 'store'])->name('store');
            Route::get('/edit/{studentAccountId}', [StudentAccountController::class, 'edit'])->name('edit');
            Route::put('/update', [StudentAccountController::class, 'update'])->name('update');
            Route::delete('/delete', [StudentAccountController::class, 'destroy'])->name('destroy');
        });
        //  Payments Routes
        Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
            Route::get('/', [PaymentController::class, 'index'])->name('index');
            Route::get('/create/{studentId}', [PaymentController::class, 'create'])->name('create');
            Route::post('/store', [PaymentController::class, 'store'])->name('store');
            Route::get('/edit/{paymentId}', [PaymentController::class, 'edit'])->name('edit');
            Route::put('/update', [PaymentController::class, 'update'])->name('update');
            Route::delete('/delete', [PaymentController::class, 'destroy'])->name('destroy');
        });
        //  Refunds Routes
        Route::group(['prefix' => 'refunds', 'as' => 'refunds.'], function () {
            Route::get('/', [RefundController::class, 'index'])->name('index');
            Route::get('/create/{studentId}', [RefundController::class, 'create'])->name('create');
            Route::post('/store', [RefundController::class, 'store'])->name('store');
            Route::get('/edit/{refundId}', [RefundController::class, 'edit'])->name('edit');
            Route::put('/update', [RefundController::class, 'update'])->name('update');
            Route::delete('/delete', [RefundController::class, 'destroy'])->name('destroy');
        });
        // Students Refunds Routes
        Route::group(['prefix' => 'studentRefunds', 'as' => 'studentRefunds.'], function () {
            Route::get('/', [StudentRefundController::class, 'index'])->name('index');
            Route::get('/create/{studentId}', [StudentRefundController::class, 'create'])->name('create');
            Route::post('/store', [StudentRefundController::class, 'store'])->name('store');
            Route::get('/edit/{studentRefundId}', [StudentRefundController::class, 'edit'])->name('edit');
            Route::put('/update', [StudentRefundController::class, 'update'])->name('update');
            Route::delete('/delete', [StudentRefundController::class, 'destroy'])->name('destroy');
        });
        //Attendance Routes
        Route::group(['prefix' => 'attendance', 'as' => 'attendance.'], function () {
            Route::get('/', [AttendanceController::class, 'index'])->name('index');
            Route::get('/create/{sectionId}', [AttendanceController::class, 'create'])->name('create');
            Route::post('/store', [AttendanceController::class, 'store'])->name('store');
        });
        //  Subjects Routes
        Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::post('/store', [SubjectController::class, 'store'])->name('store');
            Route::get('/edit/{subjectId}', [SubjectController::class, 'edit'])->name('edit');
            Route::put('/update', [SubjectController::class, 'update'])->name('update');
            Route::delete('/delete', [SubjectController::class, 'destroy'])->name('destroy');
        });
        //  Exams Routes
        Route::group(['prefix' => 'exams', 'as' => 'exams.'], function () {
            Route::get('/', [ExamController::class, 'index'])->name('index');
            Route::get('/create', [ExamController::class, 'create'])->name('create');
            Route::post('/store', [ExamController::class, 'store'])->name('store');
            Route::get('/edit/{examId}', [ExamController::class, 'edit'])->name('edit');
            Route::put('/update', [ExamController::class, 'update'])->name('update');
            Route::delete('/delete', [ExamController::class, 'destroy'])->name('destroy');
        });
        //  Online Exams Routes
        Route::group(['prefix' => 'onlineExams', 'as' => 'onlineExams.'], function () {
            Route::get('/', [OnlineExamController::class, 'index'])->name('index');
            Route::get('/create', [OnlineExamController::class, 'create'])->name('create');
            Route::post('/store', [OnlineExamController::class, 'store'])->name('store');
            Route::get('/edit/{onlineExamId}', [OnlineExamController::class, 'edit'])->name('edit');
            Route::put('/update', [OnlineExamController::class, 'update'])->name('update');
            Route::delete('/delete', [OnlineExamController::class, 'destroy'])->name('destroy');
        });
        //  Questions Routes
        Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
            Route::get('/', [QuestionController::class, 'index'])->name('index');
            Route::get('/create', [QuestionController::class, 'create'])->name('create');
            Route::post('/store', [QuestionController::class, 'store'])->name('store');
            Route::get('/edit/{questionId}', [QuestionController::class, 'edit'])->name('edit');
            Route::put('/update', [QuestionController::class, 'update'])->name('update');
            Route::delete('/delete', [QuestionController::class, 'destroy'])->name('destroy');
        });
        //  online Meetings Routes (zoom integeration)
        Route::group(['prefix' => 'onlineMeetings', 'as' => 'onlineMeetings.'], function () {
            Route::get('/', [OnlineMeetingController::class, 'index'])->name('index');
            Route::get('/create', [OnlineMeetingController::class, 'create'])->name('create');
            Route::post('/store', [OnlineMeetingController::class, 'store'])->name('store');
            Route::delete('/delete', [OnlineMeetingController::class, 'destroy'])->name('destroy');
        });
        //  multiple Meetings Routes
        Route::group(['prefix' => 'multipleMeetings', 'as' => 'multipleMeetings.'], function () {
            Route::get('/multipleMeetings/create', [OnlineMeetingController::class, 'makeMeeting'])->name('makeMeeting');
            Route::post('/multipleMeetings/store', [OnlineMeetingController::class, 'storeMeeting'])->name('storeMeeting');
        });
        //    Library Routes
        Route::group(['prefix' => 'library', 'as' => 'library.'], function () {
            Route::get('/', [LibraryController::class, 'index'])->name('index');
            Route::get('/create', [LibraryController::class, 'create'])->name('create');
            Route::post('/store', [LibraryController::class, 'store'])->name('store');
            Route::get('/edit/{libraryId}', [LibraryController::class, 'edit'])->name('edit');
            Route::put('/update', [LibraryController::class, 'update'])->name('update');
            Route::delete('/delete', [LibraryController::class, 'destroy'])->name('destroy');
            Route::get('/download/{fileName}', [LibraryController::class, 'download'])->name('download');

        });
    }
);
Route::get('/signin', [AuthController::class, 'signinPage'])->name('signinpage');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
