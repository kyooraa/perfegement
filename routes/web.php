<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfegement', [ManageController::class, 'create']);
Route::post('/perfegement', [ManageController::class, 'store'])->name('perfegement.store');