<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SearchErrorHandlingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('upload', [AwsImageController::class, 'index'])->name('image.index');
Route::post('upload', [AwsImageController::class, 'upload'])->name('image.upload')->middleware(['cors']);
Route::get('/upload/page', [AwsImageController::class, 'uploadpage']);

Route::get('/file', [FileController::class, 'uploadpage'])->name('file');
Route::post('/file', [FileController::class, 'upload'])->name('file.upload');


Route::get('/search', [SearchErrorHandlingController::class, 'index'])->name('search.index');
Route::post('/search', [SearchErrorHandlingController::class, 'search'])->name('search');