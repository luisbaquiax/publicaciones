<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'tipo_publico';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ["tipo_publico"];

}
