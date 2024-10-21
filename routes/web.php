<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/profile/{nama}', [ProfileController::class, 'profile']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/profile/{nama?}/{kelas?}/{npm?}', [UserController::class, 'profile']);
Route::get('/create', [UserController::class, 'create']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/user/profile', [UserController::class,'profile']);
Route::get('/user/list', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::resource('user', UserController::class);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

