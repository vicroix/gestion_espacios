<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    // 1) Desactivar los timestamps automáticos
    public $timestamps = false;

    // 2) (Opcional) Si tu PK no es 'id':
    protected $primaryKey = 'idreservas';

    public function espacio()
    {
        return $this->belongsTo(Espacio::class, 'id_espacio', 'idespacios');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'idusuarios');
    }

        public function grupoReservas(){
        return $this->belongsToMany(Grupo::class, 'grupo_reserva', 'id_grupo', 'id_reserva');
    }
}
