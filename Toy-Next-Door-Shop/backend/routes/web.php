<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
get = form post = hide info
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|  auth.login
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    $u = User::all();
    $c = Category::all();
    $p = Product::all();
    return view('dashboard', compact('u', 'c', 'p'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->middleware(['auth', 'IsAdmin'])->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('index');
        Route::get('createform', [CategoryController::class, 'createform'])->name('createform');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('insert', [CategoryController::class, 'insert'])->name('insert');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::get('createform', [ProductController::class, 'createform'])->name('createform');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('insert', [ProductController::class, 'insert'])->name('insert');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('menu', [ProductController::class, 'menu'])->name('menu');
    });
});
