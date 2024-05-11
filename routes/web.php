<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoicesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzeController;
use App\Http\Controllers\ReceiptStudentsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\Tstudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Auth::routes();


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('selection');


        Route::group(['namespace' => 'Auth'], function () {

            Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');

            Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

            Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');
        });
    }
);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        //==============================grade============================
        Route::resource('grade', GradeController::class);

        //==============================classroom============================
        Route::resource('classroom', ClassroomController::class);
        Route::delete('Delete_all', [ClassroomController::class, 'Delete_all'])->name('Delete_all');
        Route::get('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');

        //==============================section============================
        Route::resource('section', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'classes']);

        //==============================livewire============================
        Route::view('add_parent', 'livewire.show_Form');

        //==============================Teachers============================
        Route::resource('Teachers', TeachersController::class);
        Route::post('Upload_attachment_Teacher', [TeachersController::class, 'Upload_attachment_Teacher'])->name('Upload_attachment_Teacher');
        Route::post('Delete_attachment_Teacher', [TeachersController::class, 'Delete_attachment_Teacher'])->name('Delete_attachment_Teacher');
        Route::get('Download_attachment_Teacher/{name}/{filename}', [TeachersController::class, 'Download_attachment_Teacher'])->name('Download_attachment_Teacher');

        //==============================Students============================
        Route::resource('Students', StudentsController::class);
        Route::get('getSections/{id}', [StudentsController::class, 'getSections']);
        Route::post('Upload_attachment', [StudentsController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::post('Delete_attachment', [StudentsController::class, 'Delete_attachment'])->name('Delete_attachment');
        Route::get('Download_attachment/{name}/{filename}', [StudentsController::class, 'Download_attachment'])->name('Download_attachment');
        Route::resource('Promotions', PromotionsController::class);
        Route::resource('Graduates', GraduatedController::class);
        Route::post('Graduates/oneSoft', [GraduatedController::class, 'oneSoft'])->name('oneSoft');

        //==============================Fees============================
        Route::resource('Fees', FeeController::class);

        //==============================FeeInvoices============================
        Route::resource('FeeInvoices', FeeInvoicesController::class);

        //==============================Receipts============================
        Route::resource('Receipts', ReceiptStudentsController::class);

        //==============================ProcessingFee============================
        Route::resource('ProcessingFee', ProcessingFeeController::class);

        //==============================Payment============================
        Route::resource('Payment', PaymentController::class);

        //==============================Attendance============================
        Route::resource('Attendance', AttendanceController::class);

        //==============================subjects============================
        Route::resource('subjects', SubjectController::class);

        //==============================quizze============================
        Route::resource('quizze', QuizzeController::class);

        //==============================questions============================
        Route::resource('questions', QuestionController::class);

        //==============================library============================
        Route::resource('library', LibraryController::class);
        Route::get('downloadAttachment/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');

        //==============================Setting============================
        Route::resource('settings', SettingController::class);

        //==============================Admin============================
        Route::get('/{page}', [AdminController::class, 'index']);
    }

);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('getSections/{id}', [StudentsController::class, 'getSections']);
        Route::get('classes/{id}', [SectionController::class, 'classes']);

           }

);

