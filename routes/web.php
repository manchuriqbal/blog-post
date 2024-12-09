<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified', 'admin_auth'])->name('dashboard');

Route::middleware('auth', 'verified', 'admin_auth')
    ->prefix('admin')
    ->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('admin.profile.view');
    Route::get('/profile/edit', [\App\Http\Controllers\DashboardController::class, 'profile_edit'])->name('admin.profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\DashboardController::class, 'update_profile'])->name('admin.profile.update');

    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);

    Route::post('/posts/{comment?}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
