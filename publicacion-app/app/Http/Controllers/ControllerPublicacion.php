<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoPublicacion;
use App\Models\Categoria;
use App\Models\Publicacion;
use App\Models\Publico;
use App\Models\TipoPublico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Table;

class ControllerPublicacion extends Controller
{

    public function formPublicacion(){
        return view('create-publicacion');
    }

    public function create(){
        if(session('user')){
            $titulo = request('titulo');
            $lugar = request('lugar');
            $fecha = request('fecha');
            $hora = request('hora');
            $cupos = request('cupos');
            $url = 'url indefinido';
            $username = session('user')->username;
            $publico = request('publico');
            $estado = EstadoPublicacion::SOLICITADO->value;

            $userPublicaciones = Publicacion::where('username', '=', $username)
                ->where('estado', EstadoPublicacion::ACEPTADO->value);
            if($userPublicaciones->count() > 2){
                $estado = EstadoPublicacion::ACEPTADO->value;
            }

            $publicacion = Publicacion::create([
                'titulo' => $titulo,
                'lugar' => $lugar,
                'fecha' => $fecha,
                'hora_inicio' => $hora,
                'cupos' => $cupos,
                'url' => $url,
                'username' => $username,
                'estado' => $estado,
            ]);

            if($publicacion){
                $publicaciones = Publicacion::orderByDesc('id')->get();
                $ultimaPublicacion = $publicaciones->first();
                foreach ($publico as $p){
                    Publico::create([
                        'id_publicacion' => $ultimaPublicacion->id,
                        'tipo_publico' => $p,
                    ]);
                }
                return redirect()->route('publicacion.list')
                    ->with('success','Se ha creado tu publicación');
            }else{
                return redirect()->route('publicacion.list')
                    ->with('not-success','No se pudo crear tu publicación.');
            }
        }else{
            return redirect()->route('/');
        }
    }
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
        return view('admin/admin-publicaciones')
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
