<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificacionController extends Controller
{
    //
    public function listarNotificaciones($username){
        $resultados = DB::select("
                    SELECT p.id,
                           p.titulo,
                           p.lugar,
                           p.fecha,
                           p.hora_inicio,
                           TIMESTAMPDIFF(MINUTE, NOW(), CONCAT(p.fecha, ' ', p.hora_inicio)) AS minutos_restantes
                    FROM publicacion p
                    INNER JOIN asistencia a ON a.id_publicacion = p.id
                    INNER JOIN users u ON u.username = a.username
                    WHERE u.username = ?
                    AND CONCAT(p.fecha, ' ', p.hora_inicio) >= NOW()
                ", [$username]);
        return view('notificacion')->with('notificaciones', $resultados);
    }
}
