<?php

namespace App\Http\Controllers;

use App\FormularioPerfiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormularioPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfil = new FormularioPerfiles();
        $perfil = $request->id_aspirante;
        $perfil = $request->id_egresado;
        $perfil = $request->id_estado_civil;
        $perfil = $request->nit;
        $perfil = $request->pasaporte;
        $perfil = $request->licencia_conducir;
        $perfil = $request->id_segundo_idioma;
        $perfil = $request->nivel_idioma;
        $perfil = $request->nacionalidad;
        $perfil = $request->enfermadad_cronica;
        $perfil = $request->id_enfermadad_cronica;
        $perfil = $request->medicamento_perma;
        $perfil = $request->medicamento_mencion;
        $perfil = $request->discapacidad;
        $perfil = $request->nivel_academico;
        $perfil = $request->institucion_formadora;
        $perfil = $request->anio_graduacion;
        $perfil = $request->practica_pro;
        $perfil = $request->cursos_formacion;
        $perfil = $request->oficios_realizar;
        $perfil = $request->formacion_emprende;
        $perfil = $request->idea_negocio;
        $perfil = $request->instituto_formador_emprede;
        $perfil = $request->anio_formacion;
        $perfil = $request->experiencia_laboral;
        $perfil = $request->ultimo_periodo_trabajo;
        $perfil = $request->cargo_desempenado;
        $perfil = $request->habilidades_personales;
        $perfil = $request->difilcultades_personales;
        $perfil = $request->asistencia;
        $perfil = $request->puntualidad;
        $perfil = $request->responsabilidad;
        $perfil = $request->disponibilidad_horaria;
        $perfil = $request->recomendacion_derivada;
        $perfil = $request->otras_observaciones;
        $perfil->save();
        return $perfil;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
