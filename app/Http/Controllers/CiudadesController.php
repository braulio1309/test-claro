<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudades;

class CiudadesController extends Controller
{
    public function show($id){
        return Ciudades::where('estado_id', $id)->get();
    }
}
