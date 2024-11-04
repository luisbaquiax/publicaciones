<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoPublicacion;
use App\Http\Enums\TipoUsuario;
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

    public function updateState($id, $estado)
    {
        try {
            $publicacion = Publicacion::find($id);
            $publicacion->estado = $estado;
            $publicacion->save();
            if($estado === EstadoPublicacion::ACEPTADO->value){
                return back()->with('success','Se ha aprobado la publicación');
            }else if($estado === EstadoPublicacion::RECHAZADO->value){
                return back()->with('not-success', 'Se ha rechazado la publicación');
            }else{
                return back();
            }
        }catch (\Exception $exception){
            return back()->with('not-success', 'Se pudo actualizar la publicacion'.$exception->getMessage());
        }
    }

    public function list()
    {
        session(['editar' => '0']);
        if(session('user')){
            if(session('user')->rol === TipoUsuario::ADMIN->value){
                return redirect()->route('publicacion.getAll');
            }
            $publicaciones = Publicacion::where('estado','=',EstadoPublicacion::ACEPTADO->value)
                ->where('username', '!=', session('user')->username)
                ->orderBy('fecha','desc')
                ->get();
        }else{
            $publicaciones = Publicacion::where('estado','=',EstadoPublicacion::ACEPTADO->value)->orderBy('fecha','desc')->get();
        }

        return view('publicaciones')
            ->with('publicaciones', $publicaciones);
    }

    public function getAll()
    {
        return view('admin/admin-publicaciones')
            ->with('publicaciones', Publicacion::orderBy('fecha', 'desc')->get());
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
                ->where('publicacion.username', '!=', session('user')->username)
                ->select('publicacion.id', 'publicacion.titulo', 'publicacion.lugar', 'publicacion.fecha', 'publicacion.cupos', 'publicacion.url', 'publicacion.username', 'publicacion.estado')
                ->orderBy('fecha','desc')
                ->get();
        }else{
            $publicaciones = Publicacion::join('publico', 'publicacion.id', '=', 'publico.id_publicacion')
                ->where('publico.tipo_publico', request('filtro'))
                ->where('publicacion.estado', '=', EstadoPublicacion::ACEPTADO->value)
                ->select('publicacion.id', 'publicacion.titulo', 'publicacion.lugar', 'publicacion.fecha', 'publicacion.cupos', 'publicacion.url', 'publicacion.username', 'publicacion.estado')
                ->orderBy('fecha','desc')
                ->get();
        }
        return view('publicaciones')
            ->with('publicaciones', $publicaciones);
    }
}
