<?php

namespace App\Http\Controllers;

use App\Models\Rol; //la direccion
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
        /**se agrego para rol*/
        $rol=Rol::all();
        return view('usuarios.userform', compact('rol')); //para que se pueda visualizar
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

    /**Eliminar usuarios*/
    public function delete($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado', 'Usuario eliminado');
    }

    /**Formulario para editar usuarios*/
    public function editform($id){
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editform', compact('usuario'));
    }

    /**Edición de usuarios*/
    public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));
        Usuario::where('id', '=', $id)->update($datosUsuario);

        return back()->with('usuarioModificado','Usuario Modificado');
    }
}
