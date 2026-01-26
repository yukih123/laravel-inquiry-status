<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inquiry', [InquiryController::class, 'create'])->name('inquiry.create');
Route::post('/inquiry/confirm', [InquiryController::class, 'confirm'])->name('inquiry.confirm');
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/inquiry/complete', [InquiryController::class, 'complete'])->name('inquiry.complete');

Route::get('/admin/inquiries', [InquiryController::class, 'index']);

