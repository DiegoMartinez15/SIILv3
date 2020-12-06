<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});

/* Rutas de login no touch */
Route::post('users', 'UserController@store');
Route::post('login', 'UserController@login');
/* Aqui termina rutas login */



//*********************************************************************
/*Proteccion de rutas lo que se coloque dentro del gropu sera protegidos
con la autenticacion de laravel*/
Route::group(['middleware'=>'auth:api'],function(){

    Route::post('formfirst', 'FormAcceptController@formAccept');
    Route::ApiResource("areas","AreasController");
    Route::ApiResource("usuarios","UsuarioController");
    Route::ApiResource("empresas","EmpresaController");
    Route::get('logout', 'UserController@logout');
    Route::get('/aspirante/{id}', 'AspiranteController@index');
    Route::get('/egresado/{id}', 'EgresadoController@index');
    Route::get("/idioma","SegundoIdiomaController@index");
    Route::get("/estadocivil","EstadoCivilController@index"); 
    Route::ApiResource("perfil","FormularioPerfilController@store");  
    Route::get("/enfermedad","EnfermadadCronicaController@index");  
   
    
});
/* FIN de Group */
//************************************************************************** */











