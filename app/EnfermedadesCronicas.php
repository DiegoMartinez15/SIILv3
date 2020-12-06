<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnfermedadesCronicas extends Model
{
    protected $table = "enfermedades_cronicas";
    protected $fillable=['nombre'];

    public function perfil(){
        return $this->hasMany('App/FormularioPerfiles');
    }
}
