<?php

use App\Http\Controllers\StudentDashboard\examController;
use App\Http\Controllers\StudentDashboard\profileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('Students.index');
    });

     Route::group(['namespace' => 'students\dashboard'], function () {
            //==============================Exams============================
            Route::get('/Student/Exams', [examController::class, 'index'])->name('Sexam');
            Route::get('/Student/Exams/show/{id}', [examController::class, 'show'])->name('student_exams.show');

             // profile
            Route::get('/Student/profile', [profileController::class, 'index'])->name('profileStudent.index');
            Route::post('/Student/Updateprofile/{id}', [ProfileController::class, 'update'])->name('profileStudent.update');
        });

});
