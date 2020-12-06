<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosCiviles extends Model
{
    protected $table = "estados_civiles";
    protected $fillable=['nombre'];

    public function perfil(){
        return $this->hasMany('App/FormularioPerfiles');
    }
}
