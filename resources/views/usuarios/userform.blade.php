@extends('layouts.base')

<div @class("container mt-5")>

    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">

            <div class="card">
                <form action="" mathod="POST">
                    <div class="card-header text-center">AGREGAR USUARIO</div>

                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="Email" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
