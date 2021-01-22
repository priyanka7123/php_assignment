<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;

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
// });
Route::get('/register', [Login::class, "register"])->name('register');
Route::match(['post', 'get'], '/', [Login::class, "index"])->name('index');
Route::get('/dashboard', [Login::class, "dashboard"])->name('dashboard');
Route::post('/insert', [Login::class, "insert"])->name('insert');
// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('index');
// })->name('login');

Route::get('/logout', [Login::class, "logout"])->name('logout');
