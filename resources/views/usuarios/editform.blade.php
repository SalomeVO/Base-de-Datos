@extends('layouts.base')
@section('title', 'Modificacion de usuario')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <!--Mensaje flash-->
                @if(session("usuarioModificado"))
                    <div class="alert alert-success">
                        {{session("usuarioModificado")}}
                    </div>
                @endif

            <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card border-primary" style="background-color: #F8F8FF;">
                    <form action="{{ route('edit', $usuario->id)}}" method="POST" enctype="multipart/form-data"><!--para que acepte imagenes-->
                        @csrf @method('PATCH')

                        <div class="card-header text-center text-white bg-primary">MODIFICAR USUARIO</div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $usuario->nombre }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Email</label>
                                <input type="text" name="email" class="form-control col-md-9" value="{{ $usuario->email }}">
                            </div>

                            <!--para el formulario de imagenes-->
                            <div class="row form-group">
                                <label for="" class="col-2">Imagen</label>
                                <img src="{{ asset('storage').'/'.$usuario->imagenes}}" class="img-fluid img-thumbnail"  width="70px">
                                <input type="file" name="imagenes" class="hidden" value="{{ $usuario->imagenes}}">
                            </div>

                            <!--rol vista-->
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Rol</label>
                                        <select name="rol_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            <option class="align-self-center text-center" value="">--Rol--</option>

                                            @foreach( $rol as $roles)
                                                <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-primary col-md-9 offset-2 text-dark" style="background-color: #00BFFF;">Modificar</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

