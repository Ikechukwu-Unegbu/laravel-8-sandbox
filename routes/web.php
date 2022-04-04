<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\MultiImageUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchErrorHandlingController;
use App\Models\Product;

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


Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'get']);
Route::get('/pro/{id}', [ProductController::class, 'getApi']);

Route::get('/getquery', [ProductController::class, 'query'])->name('query');

Route::get('/postquery', [ProductController::class, 'postIndex'])->name('post.get');
Route::post('/getquery', [ProductController::class, 'queryPost'])->name('post.call');

Route::get('/morph',[GenericController::class, 'store']);

Route::get('/multi', [MultiImageUploadController::class, 'create']);
Route::post('/upload', [MultiImageUploadController::class, 'store'])->name('imageUpload');