@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Solicitudes de ')}}{{ Auth::user()->name }}
                    <!-- Si $ab esta vacío es porque no hay ninguna solicitud abierta por lo tanto muestra el boton y formulario para agregar un nueva solicitud-->
                @if($ab=="[]")
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mm">Agregar</button>
                <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Agregar Suministro</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('solicitudes.store')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Detalle') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="textarea" class="form-control @error('name') is-invalid @enderror" name="descripcion" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="250">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="idEconomato" value="{{ Auth::user()->id }}">
                        </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>#</th>
                            <th>Estado</th>
                            <th>Detalle</th>
                            <th>Fecha</th>
                            <th>Modificación</th>
                            <th><i class="bi bi-pencil-square"></i></th>
                            <th><i class="bi bi-list-columns"></i></th>
                            <th><i class="bi bi-trash3-fill"></i></th>
                        </thead>
                        <tbody>
                            @foreach($sol as $s)
                            <tr class="
                            @switch($s->estado)
                                    @case(0)
                                    table-success
                                        @break
                                    @case(1)
                                    table-warning
                                        @break
                                    @case(2)
                                    table-secondary
                                        @break
                                    @endswitch
                            ">
                                <td>{{$s->idSolicitud}}</td>
                                <!-- compara el campo estado para mostrar el texto del estado según su valor -->
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
                                    @endswitch
                                </td>
                                <td>{{$s->descripcion}}</td>                                
                                <td>{{$s->created_at->format('d/m/Y')}}</td>
                                <td>{{$s->updated_at->format('d/m/Y')}}</td>
                                <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#es" @if($s->estado!=0 or Auth::user()->id != $s->idEconomato) disabled @endif><i class="bi bi-pencil-square"></i></button>
                                <div class="modal fade" id="es" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Editar Suministro</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        <form action="{{route('solicitudes.update', $s->idSolicitud)}}" method="post">
                                        @csrf
                                        @method('put')
                                            <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Detalle') }}</label>
                                            <div class="col-md-6">
                                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="descripcion" value="{{$s->descripcion}}" required autocomplete="name" autofocus maxlength="250">{{$s->descripcion}}</textarea>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="hidden" name="idEconomato" value="{{ $s->idEconomato }}">
                                            </div>
                                            </div>
                                            <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cerrar') }}</label>
                                            <div class="col-md-6">
                                            <select class="form-select form-select-sm" name="estado">
                                                <option value="0">Abierta</option>
                                                <option value="1">CERRAR</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <a class="navbar-brand" href="{{ route('itemsolicitud.index', $s->idSolicitud) }}"><button type="submit" class="btn btn-success btn-sm"><i class="bi bi-list-columns"></i></button></a>
                                </td>
                                <td>
                                <form action="{{route('solicitudes.destroy', $s->idSolicitud)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Elimnarl{{$s->idSolicitud}}?')"  @if($s->estado!=0 or Auth::user()->id != $s->idEconomato) disabled @endif>
                                     <i class="bi bi-trash3-fill"></i>
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