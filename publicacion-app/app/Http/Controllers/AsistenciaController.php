<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Publicacion;
use Illuminate\Http\Request;

date_default_timezone_set("America/Guatemala");

class AsistenciaController extends Controller
{
    //
    public function asistir($username, $idPublicacion)
    {
        $registroBuscado = Asistencia::where('id_publicacion', $idPublicacion)->where('username', $username)->first();
        $publicacion = Publicacion::find($idPublicacion);
        if ($publicacion->fecha < date('Y-m-d')) {
            return back()->with('info', 'El evento ha finalizado.');
        }
        if ($publicacion->hora_inicio < date('H:i') && $publicacion->hora_fin >= date('Y-m-d')) {
            return back()->with('info', 'Lo sentimos ya no se permiten más registros para este evento.');
        }

        if ($publicacion->cupos <= 0) {
            return back()->with('not-success', 'Ya no hay cupos disponibles para este evento');
        }
        if ($registroBuscado) {
            return back()->with('not-success', 'Se encuentra registrado para este evento');
        } else {
            $publicacion->cupos -= 1;
            $publicacion->save();
            Asistencia::create(['id_publicacion' => $idPublicacion, 'username' => $username]);
            return back()->with('success', 'Ha sido registrado al evento');
        }
    }

}
