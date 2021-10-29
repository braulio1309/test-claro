<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;

class EstadosController extends Controller
{
    public function show($id){
        return Estados::where('pais_id', $id)->get();
    }
}
