<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $primaryKey = 'id_fotos';
    const CREATED_AT = 'creado_el';
    const UPDATED_AT = 'actualizado_el';
    // Definir la relación con la tabla espacios
    public function espacio()
    {
        return $this->belongsTo(Espacio::class, 'espacio_id');
    }
}
