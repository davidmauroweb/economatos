@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Proveedores') }}</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>Nombre del proveedor</th>
                            <th>CUIT</th>
                            <th>telefono</th>
                            <th>correo</th>
                            <th>Domicilio</th>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{$proveedor->denominacion}}</td>
                                <td>{{$proveedor->CUIT}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                <td>{{$proveedor-correo}}</td>
                                <td>{{$proveedor->domicilio}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection