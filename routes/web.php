<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\merchant\ProfileController;
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
});
