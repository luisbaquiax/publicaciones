<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ControllerReporte extends Controller
{
    //
    public function list(){

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
            'username' => $useranme
        ]);
        if($reporte){
            return back()->with('success','Se ha reportado la publicación exitosamente');
        }else{
            return back()>with('not-success','No se pudo reportar la publicación');
        }
    }
}
