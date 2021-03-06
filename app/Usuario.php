<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuarios';
    public $timestamps=false;
    protected $fillable=[
        'id', 'nombre','email','imagenes','rol_id'
    ];

    protected $primaryKey='id';
}
