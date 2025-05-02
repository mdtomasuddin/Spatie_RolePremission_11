<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//user Controller
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware("permission:user.create");
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

//product Controller 
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware("permission:product.create");
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware("permission:product.delete");
//product show
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

//Roles Controller 
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware("permission:role.create");
Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware("permission:role.edit");
Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware("permission:role.delete");
//Roles show
Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
