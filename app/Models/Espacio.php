<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table = 'espacios';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'localidad',
        'codigopostal',
        'direccion',
        'email',
        'telefono',
        'equipamiento',
        'nombre_sala',
        'tipo',
        'capacidad'
    ];
    protected $guarded = ['idespacios', 'idequipamiento'];
}
