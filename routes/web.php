<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/posts');

// Route::resource('posts', PostController::class);

Route::prefix('posts')->group(function () {

    Route::get('/', [PostController::class,'index'])->name('posts.index');

    Route::post('/', [PostController::class,'store'])->name('posts.store');

    Route::get('/create', [PostController::class,'create'])->name('posts.create')->middleware(UserAuth::class);

    Route::get('/{id}', [PostController::class,'show'])->name('posts.show');

    Route::put('/{id}', [PostController::class,'update'])->name('posts.update');

    Route::delete('/{id}', [PostController::class,'destroy'])->name('posts.destroy')->middleware(UserAuth::class);

    Route::get('/{id}/edit', [PostController::class,'edit'])->name('posts.edit')->middleware(UserAuth::class);

});


Route::post('post/comment/{id}', [CommentController::class,'store'])->name('post.comment')->middleware(UserAuth::class);


Route::prefix('user')->group(function () {

    Route::get('/registerPage', [UserController::class,'register'])->name('user.registerPage');

    Route::post('/register', [UserController::class,'store'])->name('user.register');

    Route::get('/loginPage', [UserController::class,'login'])->name('user.loginPage');

    Route::post('/login', [UserController::class,'loginCheck'])->name('user.login');

    Route::get('/logout', [UserController::class,'logout'])->name('user.logout');

});
