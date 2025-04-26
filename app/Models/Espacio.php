<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table = 'espacios';
    protected $primaryKey = 'idespacios';
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
