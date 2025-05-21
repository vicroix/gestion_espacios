<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'idusuarios';
    protected $table = 'usuarios';
    public $timestamps = false;
    public function rol(){
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
    public function grupos(){
        return $this->belongsToMany(Grupo::class, 'grupo_usuario', 'id_usuario', 'id_grupo');
    }
}
