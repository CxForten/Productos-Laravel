@extends('layouts.layout')
@section('content')

<div class="card">
    <div class="card-header border-0">
    <div class="d-flex justify-content-between">
        <h3 class="card-title">Registrar Productos</h3>
    </div>
</div>

<div class="card-body">
        <form action="{{ route('productos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre del producto">

            <label for="fecha_de_vencimiento">Fecha de vencimiento</label>
            <input type="date" name="fecha_de_vencimiento" class="form-control" placeholder="Fecha de vencimiento">

            <label for="precio">Precio</label>
            <input type="number" name="precio" class="form-control" placeholder="Precio">

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" placeholder="Cantidad">

            <label for="categoria">Categoría</label><br>
            <select class="form-select form-select-lg" name="categoria_id" id="categoria_id">
                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select><br>

            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>
    </div>
</div>

    <div class="card">
        <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Productos</h3>
        </div>
    </div>

    <div class="card-body">
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Fecha de vencimiento</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->fecha_de_vencimiento }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->categoria }}</td>
                            {{-- <td>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                    <a href="{{ route('productos.show', $producto) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  @endsection
