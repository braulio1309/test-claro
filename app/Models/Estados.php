<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pais_id',
    ];

    public function pais(){

        return $this->belongsTo('App\Model\Paises', 'pais_id','id');
    }

    public function ciudades(){

        return $this->hasMany('App\Model\Ciudades','estado_id','id');
    }
}
