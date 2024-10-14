<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $table = 'reporte';
    public $timestamps = false;
    public $fillable =[
        "id_publicacion",
        "motivo",
        "fecha",
        "username"
    ];
}
