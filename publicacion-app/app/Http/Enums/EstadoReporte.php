<?php
namespace App\Http\Enums;
enum EstadoReporte: string {
    case APROVADO = 'APROVADO';
    case IGNORADO = 'IGNORADO';
    case ACTIVO = 'ACTIVO';
}
