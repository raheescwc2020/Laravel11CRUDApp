<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\Products;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\GoogleController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function () {
    return view('home'); // Serve the home.blade.php view
})->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('log');



Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


//login wiht Google 

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Protected Routes (Dashboard, Product Management)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('products')->group(function () {
        Route::get('/', [Products::class, 'index'])->name('products.index');
        Route::get('/create', [Products::class, 'create'])->name('products.create');
        Route::post('/', [Products::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [Products::class, 'edit'])->name('products.edit');
        Route::put('/{id}', [Products::class, 'update'])->name('products.update');
    });
});

Route::get('/admin',[AdminController::class,'index'])->name('admins');
Route::get('/{id}/edit',[AdminController::class,'edit'])->name('admins.edit');
Route::delete('/products/{id}', [Products::class, 'destroy'])->name('products.destroy');
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
