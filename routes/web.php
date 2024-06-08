<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\merchant\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function() {
    return view('index');
})->name('pages.home');

Route::get('/login',[AuthenticationController::class, 'login'])->name('pages.auth.login');
Route::post('/do_login',[AuthenticationController::class, 'do_login'])->name('pages.auth.do_login');
Route::post('/logout',[AuthenticationController::class, 'logout'])->name('pages.auth.logout');

Route::get('/register',[RegisterController::class, 'register'])->name('pages.auth.register');
Route::post('/do_register',[RegisterController::class, 'do_register'])->name('pages.auth.do_register');

Route::prefix('/merchant')->middleware(['auth', 'role:0'])->group(function() {
    Route::get('/dashboard', function() {
        return view('pages.merchant.dashboard.index');
    })->name('pages.merchant.dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('pages.merchant.profile');
    Route::post('/update_profile', [ProfileController::class, 'update'])->name('pages.merchant.update_profile');

    Route::get('/products', [ProductController::class, 'index'])->name('pages.merchant.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('pages.merchant.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('pages.merchant.products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('pages.merchant.products.edit');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('pages.merchant.products.edit');
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('pages.merchant.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('pages.merchant.products.destroy');
});
