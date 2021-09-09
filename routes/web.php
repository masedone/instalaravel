<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('home');
});

Auth::routes(['verify'=>true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/configuracion',[UserController::class, 'config'])->name('config');
Route::post('/user/edit',[UserController::class, 'update'])->name('update');
Route::get('/user/avatar/{filename}',[UserController::class, 'getImage'])->name('user.avatar');
Route::get('/subir-imagen',[ImageController::class, 'create'])->name('image.create');
Route::post('/image/save',[ImageController::class, 'save'])->name('image.save');
