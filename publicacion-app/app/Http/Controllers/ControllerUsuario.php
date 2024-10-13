<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ControllerUsuario extends Controller
{
    //
    public function search(){
        $username = request("username");
        $password = request("password");
        $usuario = Usuario::find($username);
        if($usuario){
            session(['editar' => '0']);
            if($usuario->password == $password){
                session(['user' => $usuario]);
                return view("publicaciones")
                    ->with("mensaje","Credenciales incorrectos")
                    ->with("publicaciones",Publicacion::where("username","!=",$usuario->username)->get());
            }else{
                return view("publicaciones")
                    ->with("publicaciones",Publicacion::all());
            }
        }else{
            return back()->with("mensaje","Usted no está registrado.");
        }
    }

    public function signOut(){
        session()->flush();
        return redirect("/");
    }
}
