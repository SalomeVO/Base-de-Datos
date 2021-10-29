@extends('layouts.base')
@section('title', 'Formulario')
@section('content')


    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <!--Mensaje flash-->
                @if(session("usuarioGuardado"))
                    <div class="alert alert-success text-dark">
                        {{session("usuarioGuardado")}}
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

                <div class="card border-success mb-3">
                    <form action="{{ url ('/save') }}" method="POST" enctype="multipart/form-data"><!--para que acepte imagenes-->
                        @csrf

                        <div class="card-header text-center text-white bg-success">AGREGAR USUARIO</div>

                        <div class="card-body" style="background-color: #F8F8FF;" >

                            <div class="row form-group">
                                <label for="" class="col-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" placeholder="nombre">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2">Email</label>
                                <input type="text" name="email" class="form-control col-md-9" placeholder="name@gmail.com">
                            </div>

                            <!--para el formulario de imagenes-->
                            <div class="row form-group">
                                <label for="" class="col-2" >Imagen</label>
                                <input type="file" name="imagenes" class="img-fluid">
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
                                <button type="submit" class="btn btn-success col-md-9 offset-2 text-dark" style="background-color: #3CB371;">Guardar</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
