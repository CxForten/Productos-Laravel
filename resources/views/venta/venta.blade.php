@extends('layouts.layout')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Venta de {{$producto->nombre_producto}}</h3>
                </div>

    <form method="POST" action="{{route('vendido',$producto->id)}}">
        @csrf
        @method('put')

        <div class="card-body">
            <div class="form-group">
                <label>Cantidad: {{$producto->cantidad}}</label> <br>
                <label for="exampleInputEmail1">Cantidad de la compra</label>
                <input type="number" name="vendido" class="form-control" placeholder="Cantidad">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Comprar</button>
              </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

@endsection