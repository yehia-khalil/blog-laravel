<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;

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
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function () {
    Route::get('/blogs', [blogController::class, 'index'])->name('blogs.index');

    Route::get('/blogs/page/{page}', [blogController::class, 'page'])->name('blogs.page');
    
    Route::get('/blogs/create', [blogController::class, 'create'])->name('blogs.create');
    
    Route::get('/blogs/create/user', [blogController::class, 'createUser'])->name('blogs.createUser');
    
    Route::get('/blogs/{blog}', [blogController::class, 'show'])->name('blogs.show');
    
    Route::get('/blogs/{blog}/edit', [blogController::class, 'edit'])->name('blogs.edit');
    
    Route::put('/blogs/{blog}', [blogController::class, 'update'])->name('blogs.update');
    
    Route::post('/blogs', [blogController::class, 'store'])->name('blogs.store');
    
    Route::post('/blogs/user', [blogController::class, 'storeUser'])->name('blogs.storeUser');
    
    Route::get('/blog/retrieve', [blogController::class, 'retrieve'])->name('blogs.retrieve');
    
    Route::get('/blog/{blog}', [blogController::class, 'destroy'])->name('blogs.destroy');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

