<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

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

Route::get('/', function () {   return view('welcome');});
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/teste', [App\Http\Controllers\TesteController::class, 'index'])->name('teste');
Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produto');

Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
Route::post('/usuario/cadastro', [App\Http\Controllers\UsuarioController::class, 'cadastro']);
Route::get('/usuario/all', [App\Http\Controllers\UsuarioController::class, 'all']);
Route::get('/usuario/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']);






