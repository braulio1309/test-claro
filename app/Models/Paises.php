<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    public function estados(){

        return $this->hasMany('App\Model\Estados','pais_id','id');
    }
}
