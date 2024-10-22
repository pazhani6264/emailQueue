<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [EmailController::class, 'welcome'])->name('welcome');
Route::post('/send_email', [EmailController::class, 'sendEmail'])->name('send_email');
Route::get('/email-logs', [EmailController::class, 'viewEmailLogs'])->name('viewEmailLogs');
