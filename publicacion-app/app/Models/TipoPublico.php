<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPublico extends Model
{
    use HasFactory;
    public $table = "tipo_publico";
    protected $keyType = 'string';
    protected $fillable = ["tipo_publico"];
}
