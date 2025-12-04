<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return Hash::make("codeit123");
//     return view('welcome');
// });


// Frontend Routes
Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/category/{slug}", [PageController::class, "category"])->name("category");


// Breeze Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Admin Route
Route::middleware('auth')->prefix('/admin')->group(function(){
    Route::resource("/category", CategoryController::class)->names('admin.category');
    Route::resource("/article", ArticleController::class)->names('admin.article');
    Route::resource("/advertise", AdvertiseController::class)->names('admin.advertise');
});

require __DIR__ . '/auth.php';
