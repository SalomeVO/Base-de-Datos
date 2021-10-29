<?php

namespace App\Http\Controllers;

use App\Models\Rol; //la direccion
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**Listado de usuarios*/
    public function lista(){

        $users = DB::table('usuarios')
            ->join('rol','usuarios.rol_id','=','rol.id_rol')
            ->select('usuarios.*','rol.descripcion')
            ->paginate(5);

        return view('usuarios.lista', compact('users'));
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
            'email' => 'required|string|max:255|email|unique:usuarios',
            'imagenes'=>'required',  //para que se pueda guardar en imagenes
            'rol_id'=> 'required|string'
        ]);

        /**condiciones para guardar imagenes*/

        if($request->hasFile('imagenes')){
            $validator['imagenes'] = $request-> file('imagenes')->store('imagen','public');
        }

        Usuario::create([
            'nombre'=>$validator['nombre'],
            'email'=>$validator['email'],
            'imagenes'=>$validator['imagenes'],         /**para guardarlo*/
            'rol_id'=>$validator['rol_id']
        ]);

        return back()->with('usuarioGuardado', "Usuario Guardado");
    }

    /**Eliminar usuarios*/
    public function delete($id){
        $usuario = Usuario::findOrFail($id); /**para buscar todos los datos */

        /**para que borre en BD y en Codigo*/
        if (Storage::delete('public/'.$usuario->imagenes)){

            Usuario::destroy($id);
        }

        return back()->with('usuarioEliminado', 'Usuario eliminado');
    }

    /**Formulario para editar usuarios*/
    public function editform($id){

        /**se agrego para rol*/
        $rol=Rol::all();

        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editform', compact('usuario','rol'));
    }

    /**Edición de usuarios*/
    public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));

        /**para editar las imagenes*/
        if($request->hasFile('imagenes')){

            $usuario = Usuario::findOrFail($id);
            Storage::delete('public/'.$usuario->imagenes);
            $datosUsuario ['imagenes'] = $request-> file('imagenes')->store('imagen','public');
        };

        Usuario::where('id', '=', $id)->update($datosUsuario);

        return back()->with('usuarioModificado','Usuario Modificado');
    }

    /**para hacer rol*/
    public function rol_ruta(){
        $data['rols'] = Rol::paginate(3);

        return view('usuarios.list_rol', $data);
    }

}
