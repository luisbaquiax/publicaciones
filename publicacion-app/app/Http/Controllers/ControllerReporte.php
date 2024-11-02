<?php

namespace App\Http\Controllers;

use App\Http\Enums\EstadoReporte;
use App\Http\Enums\TipoUsuario;
use App\Models\Reporte;
use Illuminate\Http\Request;
date_default_timezone_set("America/Guatemala");
class ControllerReporte extends Controller
{

    //
    public function list(){
        if(!session('user')){
            return redirect()->route('login');
        }else if (session('user')->rol === TipoUsuario::ADMIN->value){
            return view('admin.admin-reporte')->with('reportes', Reporte::orderBy('id', 'asc')->get());
        }else{
            return redirect()->route('login');
        }
    }

    public function create(){
        $useranme = request('username');
        $id_publicacion = request('id');
        $motivo = request('motivo');

        $buscado = Reporte::where('username',$useranme)
            ->where('id_publicacion',$id_publicacion)
            ->limit(1)
            ->get();
        if(sizeof($buscado) > 0){
            return back()->with('not-success','Ya haz reportado la publicación');
        }
        $reporte = Reporte::create([
            'id_publicacion' => $id_publicacion,
            'motivo' => $motivo,
            'fecha' => date("Y-m-d"),
            'username' => $useranme,
            'estado' => EstadoReporte::ACTIVO->value,
        ]);
        if($reporte){
            return back()->with('success','Se ha reportado la publicación exitosamente');
        }else{
            return back()>with('not-success','No se pudo reportar la publicación');
        }
    }

    public function update($id, $estado){
        $reporte = Reporte::find($id);
        $reporte->estado = $estado;
        $reporte->save();
        echo $reporte->estado;
        if($estado === EstadoReporte::APROVADO->value){
            return back()->with('success', 'Reporte Aprobado.');
        }else{
            return back()->with('not-success', 'Reporte rechazado.');
        }
    }
}
