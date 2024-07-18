<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChapController;
use App\Http\Controllers\Api\ComicController;
use App\Http\Controllers\Api\KeywordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('comic')->group(function(){

    Route::get('last-chap', [ComicController::class, 'lastChapComic']);
    Route::get('full', [ComicController::class, 'fullComic']);
    Route::get('new', [ComicController::class, 'newComic']);
    Route::get('update', [ComicController::class, 'updateComic']);
    Route::get('category/{slug?}', [ComicController::class, 'categoryComic']);
    Route::get('keyword/{slug?}', [ComicController::class, 'keywordComic']);
    Route::get('detail/{slug?}', [ComicController::class, 'detailComic']);

});


Route::prefix('category')->group(function(){

    Route::get('list', [CategoryController::class, 'index']);

});


Route::prefix('keyword')->group(function(){

    Route::get('list', [KeywordController::class, 'index']);

});


Route::prefix('chap')->group(function(){

    Route::get('detail/{slug?}', [ChapController::class, 'detail']);

});
