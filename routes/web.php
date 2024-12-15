<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin Route
Route::middleware('auth', 'verified', 'admin_auth')
    ->prefix('admin')
    ->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.view');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password-change', [\App\Http\Controllers\ProfileController::class, 'password_change'])->name('profile.password_change');
    Route::patch('/profile/password', [\App\Http\Controllers\ProfileController::class, 'password_update'])->name('profile.password_update');

    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);

    Route::post('/posts/{post:slug}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

    Route::get('/users', [\App\Http\Controllers\AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [\App\Http\Controllers\AdminUserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\AdminUserController::class, 'edit'])->middleware('admin')->name('users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\AdminUserController::class, 'update'])->name('users.update');

    Route::resource('/tags', \App\Http\Controllers\TagController::class);

});


Route::middleware('auth', 'verified', 'admin')
    ->prefix('admin')
    ->group(function(){

        Route::resource('/roles', \App\Http\Controllers\RoleController::class);
});


// User Site Routes


Route::group(['as' => 'user.'], function () {
    Route::get('/', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home.index');

    Route::get('/posts', [\App\Http\Controllers\Home\PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post:slug}', [\App\Http\Controllers\Home\PostController::class, 'show'])->name('posts.show');
    Route::post('/posts/{post:slug}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

    Route::get('/categories', [\App\Http\Controllers\Home\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [\App\Http\Controllers\Home\CategoryController::class, 'show'])->name('categories.show');

    Route::get('/profile', [\App\Http\Controllers\Home\ProfileController::class, 'index'])->name('profie.index');
    Route::get('/profile/edit', [\App\Http\Controllers\Home\ProfileController::class, 'edit'])->name('profie.edit');
    Route::patch('/profile/update', [\App\Http\Controllers\Home\ProfileController::class, 'update'])->name('profie.update');
    Route::get('/profile/password-edit', [\App\Http\Controllers\Home\ProfileController::class, 'password_edit'])->name('profie.password_edit');
    Route::patch('/profile/password-update', [\App\Http\Controllers\Home\ProfileController::class, 'password_update'])->name('profie.password_update');

    Route::get('/authors', [\App\Http\Controllers\Home\AuthorController::class, 'index'])->name('author.index');
    Route::get('/authors/{user}', [\App\Http\Controllers\Home\AuthorController::class, 'view'])->name('author.view');

});



require __DIR__.'/auth.php';
