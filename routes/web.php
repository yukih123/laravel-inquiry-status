<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inquiry', [InquiryController::class, 'create']);
Route::post('/inquiry', [InquiryController::class, 'store']);

Route::get('/admin/inquiries', [InquiryController::class, 'index']);

