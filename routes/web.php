<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
// ホームコントローラーのindexのこと


Route::get('/create', function () {
    return view('create');
});

Route::post('/create', [HomeController::class, 'store'])->name('home.store');

Route::get('/home/article/{id}', [HomeController::class, 'show'])->name('home.article');

Route::get('/home/edit/{id}', [HomeController::class, 'edit'])->name('home.edit');

Route::put('/home/update/{id}', [HomeController::class, 'update'])->name('home.update');

Route::delete('/home/delete/{id}', [HomeController::class, 'destroy'])->name('home.delete');

// index 以外のルーティング
// Route::resource('conduit', HomeController::class)->except(['index']);

Route::get('/auth/signUp', function () { //ページに行くとこれが動く
    return view('signUp');
});
Route::post('/auth/signUp', [AuthController::class, 'register'])->name('auth.signUp'); //postするとこれが動く

Route::get('/auth/signIn', function () {
    return view('signIn');
});
Route::post('/auth', [AuthController::class, 'signIn'])->name('auth.signIn');

Route::get('/auth/Logout', [AuthController::class, 'Logout'])->name('auth.Logout');
