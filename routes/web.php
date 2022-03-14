<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\HelperController;


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
    return view('admin.layouts.master');
});

Auth::routes();
Route::post('/login',[AdminController::class,'login'])->name('login');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

    //Blogs
    Route::get('/blogs', [AdminController::class,'blogIndex'])->name('blog.index');
    Route::get('/create-blog', [AdminController::class,'blogCreate'])->name('blog.create');
    Route::get('/edit-blog/{id}', [AdminController::class,'blogEdit'])->name('blog.edit');
    Route::post('/store-blog', [AdminController::class,'blogStore'])->name('blog.store');
    Route::post('/update-blog/{id}', [AdminController::class,'blogUpdate'])->name('blog.update');
    Route::get('/delete-blog/{id}', [AdminController::class,'blogDelete'])->name('blog.delete');

    /**Image Uploader Helper */
    Route::post('/fileUploadEditor', [HelperController::class , 'fileUploadEditor'])
        ->name('fileUploadEditor');

    //Posts
    Route::get('/posts', [AdminController::class,'postIndex'])->name('post.index');
    Route::get('/create-post', [AdminController::class,'postCreate'])->name('post.create');
    Route::get('/edit-post/{id}', [AdminController::class,'postEdit'])->name('post.edit');
    Route::post('/store-post', [AdminController::class,'postStore'])->name('post.store');
    Route::post('/update-post/{id}', [AdminController::class,'postUpdate'])->name('post.update');
    Route::get('/delete-post/{id}', [AdminController::class,'postDelete'])->name('post.delete');

});
