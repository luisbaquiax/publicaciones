<?php
namespace App\Http\Enums;
enum EstadoUsuario:string
{
    case ACTIVO = 'ACTIVO';
    case DESACTIVADO = 'DESACTIVADO';
    case BANEADO = 'BANEADO';
}
