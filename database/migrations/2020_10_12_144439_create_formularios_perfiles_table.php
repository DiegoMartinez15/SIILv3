<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosPerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios_perfiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idaspirante')->unsigned();
            $table->foreign('idaspirante')->references('id')->on('aspirantes');
            $table->string('lugar_nac',75);
            $table->integer('idestado_civil')->unsigned();
            $table->foreign('idestado_civil')->references('id')->on('estados_civiles');
            $table->string('nit',10);
            $table->string('pasaporte',25);
            $table->string('licencia_conducir',2);
            $table->string('nup',25);
            $table->integer('idsegundo_idioma')->unsigned();
            $table->foreign('idsegundo_idioma')->references('id')->on('segundos_idiomas');
            $table->string('nivel_idioma',15);
            $table->string('nacionalidad',25);
            $table->integer('idenfermedad_cronica')->unsigned();
            $table->foreign('idenfermedad_cronica')->references('id')->on('enfermadades_cronicas');
            $table->string('enfermadad_mencion',150);
            $table->string('medicamento_perma',2);
            $table->string('medicamento_mencion',150);
            $table->string('discapacidad',2);
            $table->string('nivel_academico',25);
            $table->string('institucion_formadora',25);
            $table->string('anio_graduacion',15);
            $table->string('practica_pro',2);
            $table->string('cursos_informacion',150);
            $table->string('oficios_realizar',150);
            $table->string('formacion_emprende',100);
            $table->string('idea_negocio',2);
            $table->string('instituto_formador_emprede',50);
            $table->string('anio_formacion',15);
            $table->string('experiencia_laboral',250);
            $table->string('ultimo_periodo_trabajo',50);
            $table->string('cargo_desempenado',50);
            $table->string('habilidades_personales',250);
            $table->string('dificultades_personales',250);
            $table->string('asistencia',5);
            $table->string('puntualidad',5);
            $table->string('responsabilidad',5);
            $table->string('disponibilidad_horaria',20);
            $table->string('recomendacion_derivacion',75);
            $table->string('otra_observacion',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios_perfiles');
    }
}
