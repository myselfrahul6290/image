<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ImageController;

Route::get('image',[ImageController::class, 'index']);
Route::post('image/compress',[ImageController::class, 'store'])->name('image.comp');

// Route::get('image/compress/img/{id}',[ImageController::class, 'compress']);


