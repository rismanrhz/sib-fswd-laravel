<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::resource('home', HomeController::class)/* ->only(['index', 'create', 'show', 'edit']) */;

Route::get('/', function () {
    return view('landing');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::resource('student', StudentController::class);