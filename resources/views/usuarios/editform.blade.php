@extends('layouts.base')
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

                <div class="card">
                <form action="{{ route('edit', $usuario->id)}}" method="POST">
                @csrf @method('PATCH')

                    <div class="card-header text-center">MODIFICAR USUARIO</div>

                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9" value="{{ $usuario->nombre }}">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9" value="{{ $usuario->email }}">
                        </div>

                        <!--rol vista-->
                        <div class="row mb-3">
                            <div class="col-6 offset-3">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol_id" class="form-control" >
                                        <option value="">--Seleccione--</option>

                                        @foreach( $rol as $roles)
                                            <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

