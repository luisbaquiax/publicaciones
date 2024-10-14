<?php
namespace App\Http\Enums;
enum EstadoPublicacion: string
{
    case ACEPTADO = "ACEPTADO";
    case RECHAZADO = "RECHAZADO";
    case ELIMINADO = "ELIMINADO";
    case OCULTA = "OCULTA";

}
