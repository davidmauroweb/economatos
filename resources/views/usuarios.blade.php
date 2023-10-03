@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista Economatos') }}</div>
                <div class="card-body">
                <table class="table table-sn table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Capita</th>
                        <th><i class="bi bi-bag-fill"></i></th>
                        <th><i class="bi bi-list-check"></i></th>
                        <th><i class="bi bi-pencil-square"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($econo as $e)
                        <tr class="align-middle">
                        <td>{{$e->id}}</td>
                        <td>{{$e->name}}</td>
                        <td>{{$e->email}}</td>
                        <td>{{$e->capita}}</td>
                        <td><i class="bi bi-bag-fill"></i></td>
                        <td><i class="bi bi-list-check"></i></td>
                        <td>
                    
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#m{{$e->id}}"><i class="bi bi-pencil-square"></i></button>
                    <div class="modal fade" id="m{{$e->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Modificar {{$e->name}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('usuarios.update', $e->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$e->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Cuenta Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$e->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nueva Clave') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Conservar">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="capita" class="col-md-4 col-form-label text-md-end">{{ __('Cápita') }}</label>
                            <div class="col-md-6">
                                <input id="capita" type="number" class="form-control @error('capita') is-invalid @enderror" name="capita" autocomplete="capita" value="{{$e->capita}}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adm" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>
                            <div class="col-md-6">                            
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="adm" id="flexRadioDefault1" value="1"
                            @if ($e->name=1)
                            checked
                            @endif
                            >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Municipio
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="adm" id="flexRadioDefault2" checked value="0"
                            @if ($e->name=0)
                            checked
                            @endif
                            >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Economato
                            </label>
                            </div>
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
            </div>
            <div class="card mt-3">
                <div class="card-header">{{ __('Listado de Usuarios Administrativos') }}</div>
                <div class="card-body">
                <table class="table table-sn table-hover">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th><i class="bi bi-pencil-square"></i></th>
                        <th><i class="bi bi-person-fill-x"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($admins as $a)
                        <tr class="align-middle">
                        <td>{{$a->id}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->email}}</td>
                        <td><i class="bi bi-pencil-square"></i></td>
                        <td>
                            <form action="{{route('usuarios.destroy', $a->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Elimnarl{{$a->name}}?')">
                                     <i class="bi bi-person-fill-x"></i>
                                </button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="card-footer">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mm">Agregar</button>
                    <div class="modal fade" id="mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Agregar Usuario</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('usuarios.store')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Cuenta Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Clave') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Clave') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="capita" class="col-md-4 col-form-label text-md-end">{{ __('Cápita') }}</label>
                            <div class="col-md-6">
                                <input id="capita" type="number" class="form-control @error('capita') is-invalid @enderror" name="capita" required value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adm" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>
                            <div class="col-md-6">                            
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="adm" id="flexRadioDefault1" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Municipio
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="adm" id="flexRadioDefault2" checked value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Economato
                            </label>
                            </div>
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
