<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoPublicacion;
use App\Http\Enums\EstadoUsuario;
use App\Http\Enums\TipoUsuario;
use App\Http\Requests\RequestUsuario;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerUsuario extends Controller
{
    public function store()
    {
        try {
            $nombre = \request('nombre');
            $apellido = \request('apellido');
            $email = \request('email');
            $telefono = \request('telefono');
            $password = \request('password');
            $confirmPassword = \request('confirm_password');
            $username = request('username');
            echo $password.' '.$confirmPassword;
            if(Usuario::where('username', $username)->exists()){
                return back()->with('ms-username', 'El nombre de usuario ya existe');
            }
            if($password != $confirmPassword){
                return back()->with('not-success', 'Las contraseñas deben coincidir');
            }else{
                Usuario::create(
                    [
                        'username' => $username,
                        'password' => bcrypt($password),
                        'email' => $email,
                        'rol' => TipoUsuario::USUARIO->value,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'telefono' => $telefono,
                        'estado' => EstadoUsuario::ACTIVO->value,
                        'puede_publicar' => EstadoUsuario::NO->value,
                    ]
                );
                return back()->with('success', 'Se ha registrado correctamente');
            }
        } catch (\Exception $e) {
            return back()->with('not-success', 'No se pudo realizar su registro '.$e->getMessage());
        }
    }

    public function search()
    {
        $username = request("username");
        $password = request("password");
        $usuario = Usuario::find($username);

        if ($usuario) {
            if (Hash::check($password, $usuario->password)) {
                if ($usuario->rol === TipoUsuario::ADMIN->value) {
                    session(['user' => $usuario]);
                    return redirect()->route('publicacion.getAll')->with("publicaciones", Publicacion::all());
                } else {
                    if ($usuario->estado === EstadoUsuario::ACTIVO->value) {
                        session(['user' => $usuario]);
                        session(['editar' => '0']);
                        return redirect()->route('publicacion.list')
                            ->with("info", "Bienvenido a tu perfil 😄 !!!")
                            ->with("publicaciones", Publicacion::where("username", "!=", $usuario->username)
                                ->where('estado', '=', EstadoPublicacion::ACEPTADO->value)
                                ->get());
                    } else {
                        return redirect()->route('publicacion.list')
                            ->with("not-success", "No tienes acceso!!!")
                            ->with("publicaciones", Publicacion::where("estado", "=", EstadoPublicacion::ACEPTADO)->get());
                    }
                }
            } else {
                return redirect()->route('publicacion.list')
                    ->with('not-success', 'Contraseña incorrecta.')
                    ->with("publicaciones", Publicacion::where('estado', '=', EstadoPublicacion::ACEPTADO)->get());
            }
        } else {
            return back()->with("not-success", "Usted no está registrado.");
        }
    }

    public function signOut()
    {
        session()->flush();
        return redirect("/");
    }
}
