<?php

use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\Quizze;
use App\Http\Controllers\Teachers\dashboard\Tstudent;
use App\Models\students;
use App\Models\teachers;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/teacher/dashboard', function () {
            $id = teachers::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['countSection'] = $id->count();
            $data['countStudent'] = students::whereIn('section_id', $id)->count();
            return view('Teachers.dashborad.index', $data);
        });


        Route::group(['namespace' => 'Teachers\dashboard'], function () {
            //==============================students============================
            Route::get('/teacher/student', [Tstudent::class, 'index'])->name('Tstudent');
            Route::get('/teacher/sections', [Tstudent::class, 'sections'])->name('sections');
            // attendance
            Route::post('/teacher/attendance', [Tstudent::class, 'attendance'])->name('attendance');
            Route::get('/teacher/attendance_report', [Tstudent::class, 'attendanceReport'])->name('attendance.report');
            Route::post('/teacher/attendance_search', [Tstudent::class, 'attendanceSearch'])->name('attendance.search');
            // quizzes
            Route::get('/teacher/quizzes', [Quizze::class, 'index'])->name('Tquizze.index');
            Route::get('/teacher/quizzes/create', [Quizze::class, 'create'])->name('Tquizze.create');
            Route::post('/teacher/quizzes/store', [Quizze::class, 'store'])->name('Tquizze.store');
            Route::get('/teacher/quizzes/edit/{id}', [Quizze::class, 'edit'])->name('Tquizze.edit');
            Route::put('/teacher/quizzes/update', [Quizze::class, 'update'])->name('Tquizze.update');
            Route::delete('/teacher/quizzes/destroy', [Quizze::class, 'destroy'])->name('Tquizze.destroy');
            // Questions
            Route::get('/teacher/quizzes/show/{id}', [Quizze::class, 'show'])->name('Tquizze.show');
            Route::get('/teacher/Questions/add/{id}', [Quizze::class, 'addQuestions'])->name('Tquizze.addQuestions');
            Route::post('/teacher/Questions/store', [Quizze::class, 'storeQuestions'])->name('Tquizze.storeQuestions');
            Route::get('/teacher/Questions/edit/{id}', [Quizze::class, 'editQuestions'])->name('Tquizze.editQuestions');
            Route::put('/teacher/Questions/update', [Quizze::class, 'updateQuestions'])->name('Tquizze.updateQuestions');
            Route::post('/teacher/RQuestions', [Quizze::class, 'RQuestions'])->name('RQuestions');
            // Marks
            Route::get('/teacher/Questions/showMarks/{id}', [Quizze::class, 'showMarks'])->name('Tquizze.showMarks');
            Route::get('/teacher/Questions/RecycleTest/{id}', [Quizze::class, 'RecycleTest'])->name('RecycleTest');
            // profile
            Route::get('/teacher/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('/teacher/Updateprofile/{id}', [ProfileController::class, 'update'])->name('profile.update');


        });
    }
);
