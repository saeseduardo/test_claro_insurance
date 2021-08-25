<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('admin.users.index');
Route::get('users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('admin.users.create');
Route::post('users/create', [App\Http\Controllers\UsersController::class, 'store'])->name('admin.users.store');
