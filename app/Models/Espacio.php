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
        'capacidad',
        'acceso_discapacitados'
    ];
    protected $guarded = ['idespacios', 'idequipamiento'];

     // Definir la relación con la tabla fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'espacio_id', 'idespacios');
    }
}
//
