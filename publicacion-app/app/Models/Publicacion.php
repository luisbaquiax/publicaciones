<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicacion';
    public $timestamps = false;
    protected $fillable = [
        "titulo",
        "lugar",
        "fecha",
        "cupos",
        "url",
        "username",
        "estado"
    ];

}
