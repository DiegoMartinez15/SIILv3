<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormularioPerfiles extends Model
{
    protected $table = "formularios_perfiles";
    protected $fillable=['idaspirante',
    'lugar_naci',
    'id_estado_civil',
    'nit',
    'pasaporte',
    'licencia_conducir',
    'nup',
    'id_segundo_idioma',
    'nivel_idioma',
    'nacionalidad',
    'id_enfermedad_cronica',
    'enfermedad_cronica',
    'medicamento_perma',
    'medicamento_mencion',
    'discapacidad',
    'nivel_academico',
    'institucion_formadora',
    'anio_graduacion',
    'practica_pro',
    'cursos_formacion',
    'oficios_realizar',
    'formacion_emprende',
    'idea_negocio',
    'institucion_formadora_emprede',
    'anio_formacion',
    'experiencia_loboral',
    'ultimo_periodo_trabajo',
    'cargo_desempenado',
    'habilidades_personales',
    'dificultades_personales',
    'asistencia',
    'puntualidad',
    'responsabilidad',
    'disponabilidad_horaria',
    'recomendacion_derivacion',
    'otra_observaciones'];
}
