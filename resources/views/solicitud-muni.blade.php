@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Solicitudes Cerradas y Procesadas') }}</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>Estado</th>
                            <th>Economato</th>
                            <th>Descripcion</th>
                            <th>Cierre</th>
                            <th>Detalle</th>
                            <th>Procesar</th>
                        </thead>
                        <tbody>
                            @foreach($sol as $s)
                            <tr class="table-danger">
                                <td>@switch($s->estado)
                                    @case(0)
                                        Abierta
                                        @break
                                    @case(1)
                                        Cerrada
                                        @break
                                    @case(2)
                                        Procesada
                                        @break
                                    @endswitch</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->descripcion}}</td>
                                <td>{{$s->updated_at}}</td>
                                <td>
                                <a class="navbar-brand" href="{{ route('itemsolicitud.index', $s->idSolicitud) }}"><button type="submit" class="btn btn-success btn-sm"><i class="bi bi-list-columns"></i></button></a>
                                </td>
                                <td>
                                <form action="{{route('solicitudes.proceso', $s->idSolicitud)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Procesar {{$s->idSolicitud}}?')">
                                     <i class="bi bi-trash3-fill"></i>
                                </button>
                                </td>
                            </tr>
                            @endforeach
                            @foreach($cer as $s)
                            <tr>
                                <td>@switch($s->estado)
                                    @case(0)
                                        Abierta
                                        @break
                                    @case(1)
                                        Cerrada
                                        @break
                                    @case(2)
                                        Procesada
                                        @break
                                    @endswitch</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->descripcion}}</td>
                                <td>{{$s->updated_at}}</td>
                                <td>
                                <a class="navbar-brand" href="{{ route('itemsolicitud.index', $s->idSolicitud) }}"><button type="submit" class="btn btn-success btn-sm"><i class="bi bi-list-columns"></i></button></a>
                                </td>
                                <td>
                                </td>
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