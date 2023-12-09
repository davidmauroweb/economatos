@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista #') }}{{$sl->idSolicitud}} {{$sl->descripcion}} // Fecha: {{$sl->updated_at->format('d/m/Y')}}
                @switch($sl->estado)
                                    @case(0)
                                        <b>Abierta</b>
                                        @break
                                    @case(1)
                                        <b>Cerrada</b>
                                        @break
                                    @case(2)
                                        <b>Procesada</b>
                                        @break
                                    @endswitch
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th>Item</th>
                            <th class="text-end">Cantidad</th>
                            @if($sl->estado==0 and $sl->idEconomato==Auth::user()->id)
                            <th class="text-center"><i class="bi bi-pencil-square"></i></th>
                            <th class="text-center"><i class="bi bi-trash3-fill"></i></th>
                            @else
                            <th></th>
                            <th></th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($is as $i)
                            <tr>
                                <td>{{$i->nombItem}}</td>
                                <td class="text-end">{{$i->cantidad}} {{$i->medida}}</td>
                                <td class="text-center">
                                @if($sl->estado==0 and $sl->idEconomato==Auth::user()->id)
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#i{{$i->idItemSolicitud}}"><i class="bi bi-pencil-square"></i></button>
                                <div class="modal fade" id="i{{$i->idItemSolicitud}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Editar Etem</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        <form action="{{route('itemsolicitud.update', $i->idItemSolicitud)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Item') }}</label>
                                            <div class="col-md-6">
                                                <select name="idItem" id="">
                                                @foreach($ls as $l)
                                                <option value="{{$l->idItem}}" @if($l->idItem==$i->idItem) selected @endif>{{$l->nombItem}} ({{$l->medida}})</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>
                                            <div class="col-md-6">
                                                <input type="numer" name="cantidad" maxlength="5" value="{{$i->cantidad}}">
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
                                @endif
                                </td>
                                <td class="text-center">
                            <!-- Muestra la posibilidad de eliminar el item siempre que sea 0 (abierta) y que el dueño de la solicitud sea quien inicia la seción-->
                                @if($sl->estado==0 and $sl->idEconomato==Auth::user()->id)
                                <form action="{{route('itemsolicitud.destroy', $i->idItemSolicitud)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Elimnarl Item}}?')">
                                <i class="bi bi-trash3-fill"></i>
                                </button>
                                </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <!-- Muestra la posibilidad de agregar item siempre que sea 0 (abierta) y que el dueño de la solicitud sea quien inicia la seción-->
                            @if($sl->estado==0 and $sl->idEconomato==Auth::user()->id)
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mm">Agregar Item</button>
                        <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Agregar Item  la Solicitud</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('itemsolicitud.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="idSolicitud" value="{{ $sl->idSolicitud }}">
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Item') }}</label>
                                <div class="col-md-6">
                                    <select name="idItem" id="">
                                    @foreach($ls as $l)
                                    <option value="{{$l->idItem}}">{{$l->nombItem}} ({{$l->medida}})</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>
                                <div class="col-md-6">
                                    <input type="numer" name="cantidad" maxlength="5">
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
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection