@extends('layouts.layout')
@section('content')


<section class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body table-responsive p-0">
                    <table clas='table table-hover text-nowrap'>
                        <thead>
                            <tr>
                                <th>Fecha de venta</th>
                                <th>Vental total</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($ventas as $key=>$item)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$item}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
        
    </div>
</section>
@endsection