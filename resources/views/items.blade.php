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
                        <th><i class="bi bi-pencil-square"></i></th>
                    </thead>

                    <tbody>
                        <tr id="cat-" data-id="Carnes" class="opciones"><td>::</td><td><b>Carnes</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($car as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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


                    <tbody>
                        <tr id="cat-" data-id="Lácteos" class="opciones"> <td>::</td><td><b>Lácteos</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($lac as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="fyv" class="opciones"> <td>::</td><td><b>Frutas y Verduras</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($fyv as $c)
                        <tr class="align-middle cat-fyv">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Panadería" class="opciones"> <td>::</td><td><b>Panadería</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($pan as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Secos" class="opciones"> <td>::</td><td><b>Secos</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($sec as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Limpieza" class="opciones"> <td>::</td><td><b>Limpieza</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($lim as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Higiene" class="opciones"> <td>::</td><td><b>Higiene</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($hig as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Papelería" class="opciones"> <td>::</td><td><b>Papelería</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($pap as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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

                    <tbody>
                        <tr id="cat-" data-id="Otros" class="opciones"> <td>::</td><td><b>Otros</b></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @foreach ($otr as $c)
                        <tr class="align-middle cat-{{$c->categoria}}">
                        <td></td>
                        <td>{{$c->nombItem}}</td>
                        <td>{{$c->categoria}}</td>
                        <td>{{$c->rafam}}</td> 
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$c->idItem}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$c->idItem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$c->nombItem}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('items.update', $c->idItem)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombItem" type="text" class="form-control @error('nombItem') is-invalid @enderror" name="nombItem" value="{{$c->nombItem}}" required autocomplete="nombItem" autofocus>
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
                                    <option value="Carnes" @if($c->categoria=="Carnes") selected @endif >Carnes</option>
                                    <option value="Lácteos" @if($c->categoria=="Lácteos") selected @endif >Láteos</option>
                                    <option value="Frutas y Verduras" @if($c->categoria=="Frutas y Verduras") selected @endif >Frutas y Verduras</option>
                                    <option value="Panadería" @if($c->categoria=="Panadería") selected @endif >Panadería</option>
                                    <option value="Secos" @if($c->categoria=="Secos") selected @endif >Secos</option>
                                    <option value="Limpieza" @if($c->categoria=="Limpieza") selected @endif >Limpieza</option>
                                    <option value="Higiene" @if($c->categoria=="Higiene") selected @endif >Higiene</option>
                                    <option value="Papelería" @if($c->categoria=="Papelería") selected @endif >Papelería</option>
                                    <option value="Otros" @if($c->categoria=="Otros") selected @endif >Otros</option>
                                </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros" @if($c->medida=="Litros") selected @endif>Litros</option>
                                    <option value="Kilos"  @if($c->medida=="Kilos") selected @endif>Kilos</option>
                                    <option value="Unidades" @if($c->medida=="Unidades") selected @endif>Unidades</option>
                                </select>
    

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" value="{{$c->rafam}}" maxlength="10">

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
                                    <option value="Lácteos">Lácteos</option>
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
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Unidad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medida">
                                    <option value="Litros">Litros</option>
                                    <option value="Kilos">Kilos</option>
                                    <option value="Unidades">Unidades</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rafam" class="col-md-4 col-form-label text-md-end">{{ __('Código RAFAM') }}</label>

                            <div class="col-md-6">
                                <input id="rafam" type="text" class="form-control @error('rafam') is-invalid @enderror" name="rafam" placeholder="Codigo Rafam" maxlength="10">

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
