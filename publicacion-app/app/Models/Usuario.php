<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    protected $fillable = [
        "username",
        "password",
        "email",
        "rol",
        "nombre",
        "apellido",
        "telefono",
        "estado"
    ];
}
