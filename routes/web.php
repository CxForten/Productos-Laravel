<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('./layouts/layout');
});

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index'); 
Route::post('/agregarCategoria', [CategoriaController::class,'store'])->name('categorias.store');
Route::delete('/eliminarCategoria/{categoria}', [CategoriaController::class,'destroy'])->name('categorias.destroy');

Route::get('/productos', [ProductoController::class, 'index'])-> name('productos.index');
Route::post('/agregarProductos', [ProductoController::class, 'store'])-> name('productos.store');
Route::get('/modificarProducto/{id}/editar', [ProductoController::class, 'edit'])-> name('productos.edit');
Route::put('/modificarProducto/{id}', [ProductoController::class, 'update'])-> name('productos.update');
Route::delete('/eliminarProducto/{producto}', [ProductoController::class, 'destroy'])-> name('productos.destroy');
