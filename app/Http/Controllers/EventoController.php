<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

use App\Models\User;
use App\Models\Sintoma;
use App\Models\Consulta;



class EventoController extends Controller
{

    public function login(Request $request){

        $data = $request->all();


        $user = User::where('login', $data['login'])->where('senha', $data['senha'])->first();

        if($user){

            Auth::login($user);
            return response()->json(['success' => true, 'user' => $user]);


        }else{

            $userExiste = User::where('login', $data['login'])->first();

            if($userExiste){

                return response()->json(['success' => false, 'error' => 'Senha invalida']);



            }else{
                
                return response()->json(['success' => false, 'error' => 'Usuário não encontrado']);


            }


        }

    }

    public function logout(Request $request){

        $user = Auth::user();

        if ($user) {
            Auth::logout();
            return response()->json(['success' => true, 'error' => null]);
        } else {
            return response()->json(['success' => false, 'error' => 'erro ao deslogar']);
        }

    }

    public function novaConsulta(Request $request){


    }

}
