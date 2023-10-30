<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UsuariosController,ItemsController};

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
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Muni-Lista de usuarios
Route::group(['middleware' => 'admin'], function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuarios}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    //Proveedores
    Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
    Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
    Route::put('/items/{items}', [ItemsController::class, 'update'])->name('items.update');
});