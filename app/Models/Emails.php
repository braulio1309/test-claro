<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    use HasFactory;

    protected $fillable = [
        'destinatario',
        'asunto',
        'estado',
        'cuerpo',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
