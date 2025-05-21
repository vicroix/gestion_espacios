<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    public $timestamps = false;

    protected $primaryKey = 'idreservas';

    public function espacio()
    {
        return $this->belongsTo(Espacio::class, 'id_espacio', 'idespacios');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'idusuarios');
    }
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_reserva', 'id_reserva', 'id_grupo');
    }
}
