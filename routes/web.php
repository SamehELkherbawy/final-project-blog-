<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\profilecontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//user
Route::get('create_user',[Usercontroller::class,'create'])->name('create_user');
Route::post('store_user',[UserController::class,'store'])->name('store_user');
Route::get('index_user',[UserController::class,'index'])->name('index_user');
Route::get('edit_user/{id}',[UserController::class,'edit'])->name('edit_user');
Route::post('update_user',[UserController::class,'update'])->name('update_user');
Route::get('delete_user/{id}',[UserController::class,'delete'])->name('delete_user');
//login
Route::get('showLoginForm', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('login', [UserController::class, 'login'])->name('login');
//logout
Route::post('/logout', [UserController::class,'logout'])->name('logout');
//post
Route::GET('create_post',[postcontroller::class,'create'])->name('create_post');
Route::POST('store_post',[postcontroller::class,'store'])->name('store_post');
Route::GET('index_post',[postcontroller::class,'index'])->name('index_post');
Route::get('edit_post/{id}',[postcontroller::class,'edit'])->name('edit_post');
Route::post('update_post',[postcontroller::class,'update'])->name('update_post');
Route::get('delete_post/{id}',[postcontroller::class,'delete'])->name('delete_post');
//profile
Route::post('addtoprofile/{id}', [profilecontroller::class, 'store'])->name('addtoprofile');
Route::GET('profilePage',[profilecontroller::class,'profilePage'])->name('profilePage');
//FindFriend
Route::get('FindFriend',[UserController::class,'FindFriend'])->name('FindFriend');
//view profile
Route::GET('viewprofile/{id}',[postcontroller::class,'viewprofile'])->name('viewprofile');
//Admin view 
Route::get('adminUser',[UserController::class,'adminindex'])->name('adminUser');
Route::GET('adminProfilePage/{id}',[profilecontroller::class,'adminProfilePage'])->name('adminProfilePage');
