<?php

use App\Http\Controllers\Modules\AuthController;
use App\Http\Controllers\Modules\CategoryController;
use App\Http\Controllers\Modules\ChapController;
use App\Http\Controllers\Modules\ComicController;
use App\Http\Controllers\Modules\FileController;
use App\Http\Controllers\Modules\KeywordController;
use App\Http\Controllers\Modules\OtherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dang-nhap', [AuthController::class, 'login'])->name('auth-login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');




Route::get('/', [OtherController::class, 'dashboard'])->middleware('auth');

Route::middleware('auth')->prefix('quan-tri')->name('admin.')->group(function(){

    Route::get('/', [OtherController::class, 'dashboard'])->name('dashboard');

    Route::prefix('/quan-li-file')->name('file.')->group(function(){

        Route::post('/doi-ten-file', [FileController::class, 'renameFile'])->name('renameFile');
        Route::post('/doi-ten-folder', [FileController::class, 'renameFolder'])->name('renameFolder');
        Route::post('/them-folder/{path?}', [FileController::class, 'addFolder'])->where('path', '.*')->name('addFolder');
        Route::post('/them-files/{path?}', [FileController::class, 'addFiles'])->where('path', '.*')->name('addFiles');
        Route::get('/xoa-folder/{path?}', [FileController::class, 'deleteFolder'])->where('path', '.*')->name('deleteFolder');
        Route::get('/xoa-files/{path?}', [FileController::class, 'deleteFile'])->where('path', '.*')->name('deleteFile');
        Route::get('/{path?}', [FileController::class, 'index'])->where('path', '.*')->name('index');

    });

    Route::prefix('danh-muc')->name('category.')->group(function(){

        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/them', [CategoryController::class, 'add'])->name('add');
        Route::post('/them', [CategoryController::class, 'store'])->name('add');
        Route::get('/{item}/sua', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{item}/sua', [CategoryController::class, 'update'])->name('edit');
        Route::delete('/{item}/xoa', [CategoryController::class, 'delete'])->name('delete');

    });


    Route::prefix('tu-khoa')->name('keyword.')->group(function(){

        Route::get('/', [KeywordController::class, 'index'])->name('index');
        Route::get('/them', [KeywordController::class, 'add'])->name('add');
        Route::post('/them', [KeywordController::class, 'store'])->name('add');
        Route::get('/{item}/sua', [KeywordController::class, 'edit'])->name('edit');
        Route::put('/{item}/sua', [KeywordController::class, 'update'])->name('edit');
        Route::delete('/{item}/xoa', [KeywordController::class, 'delete'])->name('delete');

    });


    Route::prefix('truyen')->name('comic.')->group(function(){

        Route::get('/', [ComicController::class, 'index'])->name('index');
        Route::get('/them', [ComicController::class, 'add'])->name('add');
        Route::post('/them', [ComicController::class, 'store'])->name('add');
        Route::get('/{item}/sua', [ComicController::class, 'edit'])->name('edit');
        Route::put('/{item}/sua', [ComicController::class, 'update'])->name('edit');
        Route::delete('/{item}/xoa', [ComicController::class, 'delete'])->name('delete');

    });

    Route::prefix('chuong')->name('chap.')->group(function(){

        Route::get('/{comic}/danh-sach', [ChapController::class, 'index'])->name('index');
        Route::get('/{comic}/them', [ChapController::class, 'add'])->name('add');
        Route::post('/{comic}/them', [ChapController::class, 'store'])->name('add');
        Route::get('/{item}/sua', [ChapController::class, 'edit'])->name('edit');
        Route::put('/{item}/sua', [ChapController::class, 'update'])->name('edit');
        Route::delete('/{item}/xoa', [ChapController::class, 'delete'])->name('delete');

    });

});
