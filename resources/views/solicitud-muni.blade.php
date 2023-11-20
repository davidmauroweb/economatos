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
                            <tr @if ($s->estado == 1) class="table-danger" @endif>
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
                                <td class="text-center">
                                    <a class="navbar-brand" href="{{ route('itemsolicitud.index', $s->idSolicitud) }}"><button type="submit" class="btn btn-success btn-sm"><i class="bi bi-list-columns"></i></button></a>
                                </td>
                                <td class="text-center">
                                <form action="{{route('solicitudes.proceso', $s->idSolicitud)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('¿Procesar {{$s->idSolicitud}}?')"  @if($s->estado > 1) disabled @endif>
                                <i class="bi bi-check-circle-fill"></i>
                                </button>
                                </form>
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