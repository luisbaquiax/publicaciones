<?php

namespace App\Http\Controllers;

use App\Models\TipoPublico;
use Illuminate\Http\Request;

class ControllerTipoPublico extends Controller
{
    //
    public function list(){
        return TipoPublico::all();
    }
}
