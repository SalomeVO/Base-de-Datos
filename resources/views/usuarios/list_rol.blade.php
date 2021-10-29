@extends('layouts.base')
@section('title', 'Lista Rol')
@section('content')
    <div class="container mt-5" action="{{url('/rol_ruta')}}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5">Roles Registrados</h2>

                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr style="background-color: #9370D8;">
                        <th>ID</th>
                        <th>Descripcion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($rols as $rol)
                        <tr>
                            <td>{{$rol->id_rol}}</td>
                            <td>{{$rol->descripcion}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                {{ $rols->links() }}

            </div>
        </div>
    </div>
@endsection
