<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoPublicacion;
use App\Models\Categoria;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Table;

class ControllerPublicacion extends Controller
{
    //
    public function list()
    {
        session(['editar' => '0']);
        if(session('user')){
            $publicaciones = Publicacion::where('estado','=',EstadoPublicacion::ACEPTADO->value)
                ->where('username', '!=', session('user')->username)
                ->get();

        }else{
            $publicaciones = Publicacion::where('estado','=',EstadoPublicacion::ACEPTADO->value)->get();
        }

        return view('publicaciones')
            ->with('publicaciones', $publicaciones);
    }

    public function getAll()
    {
        return view('admin/adminPublicaciones')
            ->with('publicaciones', Publicacion::all());
    }

    public function listByUsername($username)
    {
        if (!session('user')) {
            return view('login');
        }

        $publicaciones = Publicacion::where('username','=', $username)
            ->get();
        session(['editar' => '1']);
        return view('publicaciones')
            ->with('publicaciones', $publicaciones);
    }

    public function filterPublicaciones()
    {

        if(session('user')){
            $publicaciones = Publicacion::join('publico', 'publicacion.id', '=', 'publico.id_publicacion')
                ->where('publico.tipo_publico', request('filtro'))
                ->where('publicacion.estado', '=', EstadoPublicacion::ACEPTADO->value)
                ->where('publicacion.username', '=', session('user')->username)
                ->select('publicacion.id', 'publicacion.titulo', 'publicacion.lugar', 'publicacion.fecha', 'publicacion.cupos', 'publicacion.url', 'publicacion.username', 'publicacion.estado')
                ->get();
        }else{
            $publicaciones = Publicacion::join('publico', 'publicacion.id', '=', 'publico.id_publicacion')
                ->where('publico.tipo_publico', request('filtro'))
                ->where('publicacion.estado', '=', EstadoPublicacion::ACEPTADO->value)
                ->select('publicacion.id', 'publicacion.titulo', 'publicacion.lugar', 'publicacion.fecha', 'publicacion.cupos', 'publicacion.url', 'publicacion.username', 'publicacion.estado')
                ->get();
        }
        return view('publicaciones')
            ->with('publicaciones', $publicaciones);
    }
}
