<?php

use App\Http\Controllers\ControllerView;
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

Route::get('/', [ControllerView::class, 'login'])->name('login');
Route::get('/register', [ControllerView::class, 'register'])->name('register');

