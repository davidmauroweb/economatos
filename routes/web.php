<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UsuariosController,ItemsController,SolicitudController,ProveedoresController,ItemSolicitudController};

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
//Muni
Route::group(['middleware' => 'admin'], function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuarios}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    //items
    Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
    Route::get('/items/{cat}',[ItemsController::class, 'show'])->name('items.show');
    Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
    Route::put('/items/{items}', [ItemsController::class, 'update'])->name('items.update');
    //proveedores
    Route::get('/proveedores', [ProveedoresController::class,'index'])->name('proveedores.index');
    //Solicitudes
    Route::get('/solicitudes', [SolicitudController::class,'index'])->name('solicitudes.index');
});
//Solicitudes
Route::get('/solicitudes/{econ}', [SolicitudController::class,'show'])->name('solicitudes.show');
Route::post('/solicitudes', [SolicitudController::class,'store'])->name('solicitudes.store');
Route::put('/solicitudes/{sol}', [SolicitudController::class, 'update'])->name('solicitudes.update');
Route::delete('/solicitudes/{sol}', [SolicitudController::class,'destroy'])->name('solicitudes.destroy');
