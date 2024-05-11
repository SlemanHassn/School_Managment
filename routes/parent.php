<?php

use App\Http\Controllers\parents\dashboard\childernController;
use App\Http\Controllers\parents\dashboard\profileController;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {
        $sons= students::where('parent_id',auth()->user()->id)->get();
        return view('parents.index',compact('sons'));
    });

       Route::get('/parent/Sons', [childernController::class, 'index'])->name('Sons');
       Route::get('/parent/degrees/{id}', [childernController::class, 'show'])->name('degrees');
       Route::get('/parent/Attendance', [childernController::class, 'attendance'])->name('attendance');
       Route::post('/parent/attendanceSearch', [childernController::class, 'attendanceSearch'])->name('attendanceSearch');
       Route::get('/parent/Fees_invoiceParent', [childernController::class, 'Fees_invoiceParent'])->name('Fees_invoiceParent');
       Route::get('/parent/sonsReceipt/{id}', [childernController::class, 'sonsReceipt'])->name('sonsReceipt');

           // profile
            Route::get('/parent/profile', [profileController::class, 'index'])->name('profileparent.index');
            Route::post('/parent/Updateprofile/{id}', [ProfileController::class, 'update'])->name('profileparent.update');

});
