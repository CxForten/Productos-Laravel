@extends('layouts.layout')
@section('content')

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table-search" class="form-control float-right" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
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
                                    <td class="project-actions">
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $producto->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <div style="display: inline-block">

                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <!-- Button trigger modal -->


                                    <div class="modal fade" id="exampleModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nombre_producto">Nombre del producto</label>
                                                    <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre del producto" value="{{ $producto->nombre_producto }}">

                                                    <label for="fecha_de_vencimiento">Fecha de vencimiento</label>
                                                    <input type="date" name="fecha_de_vencimiento" class="form-control" placeholder="Fecha de vencimiento" value="{{ $producto->fecha_de_vencimiento }}">

                                                    <label for="precio">Precio</label>
                                                    <input type="number" name="precio" class="form-control" placeholder="Precio" value="{{ $producto->precio }}">

                                                    <label for="cantidad">Cantidad</label>
                                                    <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" value="{{ $producto->cantidad }}">

                                                    <label for="categoria">Categoría</label>
                                                    <select class="custom-select" name="categoria_id" id="categoria_id">
                                                        @foreach ($categorias as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $producto->categoria_id == $item->id ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                                            @endforeach
                                                        </select><br>
                                              </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
  <!-- Modal -->
  {{-- <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <form action="{{ route('productos.update','$producto->id') }}" method="post"> --}}
                {{-- @csrf
                @method('PUT')
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
                    <select class="custom-select" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select><br>
        </div> --}}
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card ">
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
                                <select class="custom-select" name="categoria_id" id="categoria_id">
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select><br>

                                    <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
