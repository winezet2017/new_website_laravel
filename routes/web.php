<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});

//* Post Route

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');  // Show create post form
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Show the form to edit a post
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Handle form submission for creating a post
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Handle form submission for updating a post
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::resource('posts', PostController::class);


//* User Route
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//* Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

require __DIR__ . '/auth.php';
