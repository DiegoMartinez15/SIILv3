<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnfermedadesCronicas extends Model
{
    protected $table = "enfermedades_cronicas";
    protected $fillable=['nombre'];
}
