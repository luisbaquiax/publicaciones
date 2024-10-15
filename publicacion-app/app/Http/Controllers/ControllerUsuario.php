<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoPublicacion;
use App\Http\Enums\EstadoUsuario;
use App\Http\Enums\TipoUsuario;
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
            if($usuario->password == $password){
                if($usuario->rol === TipoUsuario::ADMIN->value){
                    session(['user' => $usuario]);
                    return redirect()->route('publicacion.getAll')->with("publicaciones", Publicacion::all());
                }else{
                    if($usuario->estado === EstadoUsuario::ACTIVO->value){
                        session(['user' => $usuario]);
                        session(['editar' => '0']);
                        //view("publicaciones")
                        return redirect()->route('publicacion.list')
                            ->with("info","Bienvenido a tu perfil 😄 !!!")
                            ->with("publicaciones", Publicacion::where("username","!=",$usuario->username)
                                ->where('estado', '=', EstadoPublicacion::ACEPTADO->value)
                                ->get());
                    }else{
                        return redirect()->route('publicacion.list')
                            ->with("not-success","No tienes acceso!!!")
                            ->with("publicaciones",Publicacion::where("estado","=",EstadoPublicacion::ACEPTADO)->get());
                    }
                }
            }else{
                return view("publicaciones")
                    ->with("publicaciones",Publicacion::where('estado','=',EstadoPublicacion::ACEPTADO)->get());
            }
        }else{
            return back()->with("not-success","Usted no está registrado.");
        }
    }

    public function signOut(){
        session()->flush();
        return redirect("/");
    }
}
