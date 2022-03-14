<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsImageController;

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