<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Models\User;


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
    return view('frontend.home');
    })->name('home');
//admin start

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::get('/admin/profile', [AdminController::class,  'profile'])->middleware(['auth'])
 ->name('admin.profile');
 //admin end
 
 //category
Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
 Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
 Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
 Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
 Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

 //movie
 Route::get('/admin/movie/index', [MovieController::class, 'index'])->name('admin.movie.index');
 Route::get('/admin/movie/create', [MovieController::class, 'create'])->name('admin.movie.create');
 Route::get('/admin/movie/edit/{id}', [MovieController::class, 'edit'])->name('admin.movie.edit');
 Route::post('/admin/movie/store', [MovieController::class, 'store'])->name('admin.movie.store');
 Route::get('/admin/movie/delete/{id}', [MovieController::class, 'delete'])->name('admin.movie.delete');

 //user start 
 Route::get('/admin/user/list', [AdminController::class, 'user_list'])->name('admin.user.list');

Route::get('user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'user'])->name('user.dashboard');

//user end





require __DIR__.'/auth.php';
