<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estado_id',
    ];

    public function estado(){
        return $this->belongsTo('App\Model\Estados', 'estado_id','id');
    }
}
