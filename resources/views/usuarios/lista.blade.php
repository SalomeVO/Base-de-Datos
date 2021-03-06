@extends('layouts.base')
@section('title', 'Lista Usuario')
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
                <tr class="table-success">
                    <th class="border border-dark" >Foto</th>
                    <th class="border border-dark" >Nombre</th>
                    <th class="border border-dark" >Email</th>
                    <th class="border border-dark" >Rol</th>
                    <th class="border border-dark" >Acciones</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border border-secondary" >
                            <!--para mandar a llamar la imagen-->
                            <img src="{{ asset('storage').'/'.$user->imagenes}}" class="img-fluid img-thumbnail"  width="70px">
                        </td>
                        <td class="border border-secondary" >{{$user->nombre}}</td>
                        <td class="border border-secondary" >{{$user->email}}</td>
                        <td class="border border-secondary" >{{$user->descripcion}}</td><!--para la columna rol-->
                        <td class="border border-secondary" >
                            <div class="btn-group"><!--Para que los bonotes esten a la par-->

                                <a href="{{route('editform', $user->id)}}" class="btn btn-primary mb-3 mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('delete', $user->id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('??Seguro de eliminar el usuario?')" class="btn btn-danger">
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
