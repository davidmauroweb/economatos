@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Solicitudes') }}
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="descripcion" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="250">
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
                            <th>ID</th>
                            <th>Estado</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th><i class="bi bi-cart-fill"></i></th>
                            <th>A</th>
                            <th>X</th>
                        </thead>
                        <tbody>
                            @foreach($sol as $s)
                            <tr>
                                <td>{{$s->idSolicitud}}</td>
                                <td>{{$s->estado}}</td>
                                <td>{{$s->descripcion}}</td>
                                <td>{{$s->updated_at}}</td>
                                <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#es" @if($s->estado!=0) disabled @endif><i class="bi bi-cart-fill"></i></button>
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
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="descripcion" value="{{$s->descripcion}}" required autocomplete="name" autofocus maxlength="250">
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
                                <button type="submit" class="btn btn-success btn-sm">
                                     <i class="bi bi-cart-plus-fill"></i>
                                </button>
                                </td>
                                <td>
                                <form action="{{route('solicitudes.destroy', $s->idSolicitud)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Elimnarl{{$s->idSolicitud}}?')"  @if($s->estado!=0) disabled @endif>
                                     <i class="bi bi-cart-x-fill"></i>
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