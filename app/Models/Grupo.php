<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'id_grupo';
    protected $table = 'grupos';
    public $timestamps = false;
}
