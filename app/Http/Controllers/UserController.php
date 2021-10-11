<?php

namespace App\Http\Controllers;

use App\Usario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /** Formulario de usuario */
    public function userform(){
        return view('usuarios.userform');
    }

    /** Guardar usuarios */
    public function save(Request $request){

        $userdata = request()->except("_token");
        Usuario::insert($userdata);

        return "Usuario Guardado";
    }
}
