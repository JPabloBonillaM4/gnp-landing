<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::post('/submit-form', [GeneralController::class, 'submitForm'])->name('submit.form');
