@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista Items') }}</div>
                <div class="card-body">
                <table class="table table-sn table-hover">
                    <thead>
                        <th>#</th>
                        <th>Item</th>
                        <th>Categoria</th>
                        <th>RAFAM</th>
                        <th><i class="bi bi-bag-fill"></i></th>
                        <th><i class="bi bi-list-check"></i></th>
                        <th><i class="bi bi-pencil-square"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($lista as $l)
                        <tr class="align-middle">
                        <td>{{$l->idItem}}</td>
                        <td>{{$l->nombItem}}</td>
                        <td>{{$l->categoria}}</td>
                        <td>{{$l->rafam}}</td>
                        <td><i class="bi bi-bag-fill"></i></td>
                        <td><i class="bi bi-list-check"></i></td>
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$l->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$l->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$l->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $l->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$l->nombItem}}" required autocomplete="nombItem" autofocus>
                                @error('nombItem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Categoría') }}</label>

                            <div class="col-md-6">

                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoria">
                                    <option value="Carnes" @if($l->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Láteos" @if($l->categoria=="Láteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($l->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($l->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($l->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($l->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($l->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($l->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($l->categoria=="Otros") selected @endif >Otros</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$l->rafam}}">

                                @error('rafam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mm">Agregar</button>
                    <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Agregar Usuario</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.store')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" placeholder="Nombre Item" required autocomplete="nombItem" autofocus>
                                @error('nombItem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Categoría') }}</label>

                            <div class="col-md-6">

                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoria">
                                    <option value="Carnes">Carnes</option>
                                    <option value="Láteos">Láteos</option>
                                    <option value="Frutas y Verduras">Frutas y Verduras</option>
                                    <option value="Panadería">Panadería</option>
                                    <option value="Secos">Secos</option>
                                    <option value="Limpieza">Limpieza</option>
                                    <option value="Higiene">Higiene</option>
                                    <option value="Papelería">Papelería</option>
                                    <option value="Otros">Otros</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" placeholder="Codigo Rafam">

                                @error('rafam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                </div>
                </div>
            </div>
    </div>
</div>
@endsection
