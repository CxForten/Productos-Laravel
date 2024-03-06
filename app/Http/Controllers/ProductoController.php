<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->where('productos.estado', 1)
            ->where('categorias.nombre', 'like', '%'. $request->buscar.'%')
            ->select('productos.*', 'categorias.nombre as categoria')
            ->get();
            return view('productos.index', compact('productos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Producto::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.index', compact('productos', 'categorias'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        $producto=DB::table('productos')
        ->where('id', $id)
        ->update([
            'nombre_producto' => $request->nombre_producto,
            'fecha_de_vencimiento' => $request->fecha_de_vencimiento,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'categoria_id' => $request->categoria_id,
        ]);

        if ($producto) {
            // Redireccionar con un mensaje de éxito
            return back()->with('success', 'Producto actualizado correctamente.');
        } else {
            // Redireccionar con un mensaje de error
            return back()->with('error', 'No se pudo actualizar el producto.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->estado = false;
        $producto->save();
        return back();
    }

}
