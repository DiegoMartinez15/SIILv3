<?php

namespace App\Http\Controllers;
use App\User;
use App\Aspirante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return response()->json([
            'res' => true,
            'message' =>"Usuario creado correctamente"
        ],200);
    }

    public function login(Request $request){
        //$user = Aspirante::whereCodigo($request->email)->first();
        $user = Aspirante::where("codigo","=",$request->email)->first();
        
        if($user != null && $request->password == $user->password){/* AQUI HAY PROBLEMA POR QUE NO SE COMO CIFRAN LA CLAVE */
            $tableUser = User::where("idaspirante","=",$user->id)->first();
            if($tableUser == null){
                $input = $user->id;
                User::create([
                    'estado' => 'N',
                    'idform_accept'=> null,
                    'idtipo_usuario' => 2,
                    'idaspirante' => $input, 
                ]);
                $tableUser = User::where("idaspirante","=",$user->id)->first();
                if($tableUser != null){
                    $token = $tableUser->createToken('SIILv3')->accessToken;
                    return response()->json([
                        'res' => true,
                        'message' =>"Todo bien hasta ahorita primer if de creacion",
                        'user'=>$tableUser,
                        'token'=>$token
                    ],200);
                }else{
                    return response()->json([
                        'res' => true,
                        'message' =>"Algp esta mal donde hace el token por primera ves",
                       
                    ],200);
                }
            }else{
                $token = $tableUser->createToken('SIILv3')->accessToken;
                return response()->json([
                    'res' => true,
                    'message' =>"Todo bien hasta ahorita ya ingreso y esta es la segunda vez if de creacion",
                    'user'=>$tableUser,
                    'token'=>$token
                ],200);
            }
        }else{
            return response()->json([
                'res' => true,
                'message' =>"El codigo o contraseña son incorrectos"
            ],200);
        }

        return response()->json([
            'res' => true,
            'message' =>$user
        ],200);



        /*$user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password)){
            $token = $user->createToken('SIILv3')->accessToken;
            return response()->json([
                'res' => true,
                'token' => $token,
                'message' =>"Bienvenido al sistema ",
                'user' => $user
            ],200);
        }else{
            
        }*/
    }
    public function logout(){
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        
        $user->save();
        return response()->json([
            'res' => true,
            'message' =>"adios",
            'user'=> $user
        ],200);
    }

}
