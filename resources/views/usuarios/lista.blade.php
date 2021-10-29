@extends('layouts.base')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios Registrados</h2>
            <a class="btn btn-success mb-4" href="{{url('/form')}}">AGREGAR</a>

            <!--Mensaje flahs de usuario eliminado-->
            @if(session('usuarioEliminado'))
            <div class="alert alert-danger">
            {{session('usuarioEliminado')}}
            </div>
            @endif

            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <!--para mandar a llamar la imagen-->
                            <img src="{{ asset('storage').'/'.$user->imagenes}}" class="img-fluid img-thumbnail" width="80px">
                        </td>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->descripcion}}</td><!--para la columna rol-->
                        <td>
                            <div class="btn-group"><!--Para que los bonotes esten a la par-->

                                <a href="{{route('editform', $user->id)}}" class="btn btn-primary mb-3 mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('delete', $user->id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Seguro de eliminar el usuario?')" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                     @endforeach

                </tbody>

            </table>

            {{ $users->links() }}

        </div>
    </div>
</div>
@endsection
