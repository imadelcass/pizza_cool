<?php

use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;

Route::get('/', [PizzaController::class, 'index'])->name('pizzas');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/pizzas/{pizza:slug}', [PizzaController::class, 'show']);
    Route::get('/categories/{category:name}', [CategoryController::class, 'show']);
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    
    Route::get('/admin', [AdminController::class,'index'])->name('admin')->middleware('admin');
    Route::post('/admin', [AdminController::class,'update'])->name('admin')->middleware('admin');
    Route::get('/admin/category/{category}', [AdminController::class,'edit'])->middleware('admin');

});
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register' , [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});

Route::post('/pizzas/{pizza}/likes', [LikeController::class,'store'])->name('pizzas.likes');
Route::delete('/pizzas/{pizza}/likes', [LikeController::class,'destroy'])->name('pizzas.likes');
// Let users add commentaires to each pizza 
Route::post('/pizzas/{pizza}/comments', [CommentController::class,'store'])->name('pizzas.comments');
// Let users delet commentaires belongs to him
Route::delete('/pizzas/{comment}/delete', [CommentController::class,'delete'])->name('comment.delete'); 
// add user homepage and display all liked pizzas
Route::get('/profile/{user:username}', [UserController::class,'index']);
