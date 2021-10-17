<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**Listado de usuarios*/
    public function lista(){
        $data['users'] = Usuario::paginate(3);

        return view('usuarios.lista', $data);
    }

    /** Formulario de usuario */
    public function userform(){
        return view('usuarios.userform');
    }

    /** Guardar usuarios */
    public function save(Request $request){

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:usuarios'
        ]);

        $userdata = request()->except("_token");
        Usuario::insert($userdata);

        return back()->with('usuarioGuardado', "Usuario Guardado");
    }
}
