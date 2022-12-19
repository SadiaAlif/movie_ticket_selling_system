<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ReviewController;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Category;

Route::get('/', function () {
    $data = [
        'movies'            => Movie::latest()->take(6)->get(),
        'popular_movies'    => Movie::withSum('bookedTickets', 'qty')->orderBy('booked_tickets_sum_qty','desc')->take(6)->get(),
    ];

    return view('frontend.home', $data);
})->name('home');

//movie start
Route::get('/movies', function () {

    $movies = Movie::get();
    $categories= Category::get();
    return view('frontend.movies', compact('categories','movies'));
})->name('movies');
//movie end

//contact start 
Route::get('/contact', function () {


    return view('frontend.contact');
})->name('contact');

//contact end

Route::get('/details/{id}', [MovieController::class, 'details'])->name('details');
Route::post('/buy_ticket', [MovieController::class, 'buy_ticket'])->name('buy_ticket');
Route::post('/contact', [AdminController::class, 'contact'])->name('admin.contact');

//review
Route::post('review-store', [\App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');


//admin start
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware(['auth'])->name('admin.profile');
 
    //category
    Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    //movie
    Route::get('/admin/movie/index', [MovieController::class, 'index'])->name('admin.movie.index');
    Route::get('/admin/movie/create', [MovieController::class, 'create'])->name('admin.movie.create');
    Route::post('/admin/movie/store', [MovieController::class, 'store'])->name('admin.movie.store');
    Route::get('/admin/movie/edit/{id}', [MovieController::class, 'edit'])->name('admin.movie.edit');
    Route::post('/admin/movie/update/{id}', [MovieController::class, 'update'])->name('admin.movie.update');
    Route::get('/admin/movie/delete/{id}', [MovieController::class, 'delete'])->name('admin.movie.delete');

    //branch
     Route::get('/admin/branch/index', [BranchController::class, 'index'])->name('admin.branch.index');
     Route::get('/admin/branch/create', [BranchController::class, 'create'])->name('admin.branch.create');
     Route::post('/admin/branch/store', [BranchController::class, 'store'])->name('admin.branch.store');
     Route::get('/admin/branch/edit/{id}', [BranchController::class, 'edit'])->name('admin.branch.edit');
     Route::post('/admin/branch/update/{id}', [BranchController::class, 'update'])->name('admin.branch.update');
     Route::get('/admin/branch/delete/{id}', [BranchController::class, 'delete'])->name('admin.branch.delete');
 

    Route::get('/admin/ticket_list', [AdminController::class, 'ticket_list'])->name('admin.ticket_list');
    Route::get('/admin/contact_list', [AdminController::class, 'contact_list'])->name('admin.contact_list');
    Route::get('/admin/user/list', [AdminController::class, 'user_list'])->name('admin.user.list');
    
    //admin end
});

 //user start 
 Route::middleware(['auth', 'user'])->group(function () {

    Route::get('user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/ticket_list', [UserController::class, 'ticket_list'])->name('user.ticket_list');
    Route::get('/user/invoice/{id}', [UserController::class, 'invoice'])->name('user.invoice');
});
//user end


Route::post('movie_times', [MovieController::class, 'movieTimes'])->name('movie_times');


require __DIR__.'/auth.php';
