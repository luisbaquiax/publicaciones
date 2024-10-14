<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publico extends Model
{
    use HasFactory;
    protected $table = 'publico';
    public $timestamps = false;
    protected $fillable = ["id_publicacion", "tipo_publico"];
}
