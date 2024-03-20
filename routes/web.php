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
Route::get('/modificarProducto/{productos}/editar', [ProductoController::class, 'edit'])-> name('productos.edit');
Route::put('/modificarProducto/{productos}', [ProductoController::class, 'update'])-> name('productos.update');
Route::delete('/eliminarProducto/{producto}', [ProductoController::class, 'destroy'])-> name('productos.destroy');

Route::get('/venta/{producto}', [ProductoController::class, 'venta'])->name('producto.vender');
Route::put('/ventaRealizada/{producto}',[ProductoController::class, 'vendido'])->name('vendido');
Route::get('/ventaFecha', [ProductoController::class,'ventaFecha'])->name('venta');