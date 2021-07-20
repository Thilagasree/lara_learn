<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController; 

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
    return view('welcome');
});

Route::get('/register',[loginController::class,'index']);
Route::any('/savReg',[loginController::class,'save'])->name('save_Act');

Route::get('/login',[loginController::class,'store']);
Route::any('/store',[loginController::class,'show'])->name('show_user');

Route::view('/home','home');
Route::view('/dashboard','dashboard');
Route::view('/student','student');

