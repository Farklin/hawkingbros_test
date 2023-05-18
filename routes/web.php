<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ArticleController::class, 'index']);
Route::get('/like/{article_id}', [LikeController::class, 'like'])->name('like');
Route::get('/unlike/{article_id}', [LikeController::class, 'unlike'])->name('unlike');
