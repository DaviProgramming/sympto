<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\LoginLog;
use App\Models\LogoutLog;
use Exception;

class EventoController extends Controller
{

    public function login(Request $request)
    {

        $data = $request->all();


        $user = User::where('login', $data['login'])->where('senha', $data['senha'])->first();

        if ($user) {

            try {
                Auth::login($user);

                LoginLog::create([
                    'user_id' => $user->id,
                    'ip_address' => $request->ip(),
                    'logged_in_at' => now(),
                    'device'=> json_encode($data['device']),
                ]);


                return response()->json(['success' => true, 'user' => $user]);

            } catch (\Exception $e) {

                return response()->json(['success' => false, 'error' => $e->getMessage(), 'id' => $user->id]);
            }
        } else {

            $userExiste = User::where('login', $data['login'])->first();

            if ($userExiste) {

                return response()->json(['success' => false, 'error' => 'Senha invalida']);
            } else {

                return response()->json(['success' => false, 'error' => 'Usuário não encontrado']);
            }
        }
    }

    public function logout(Request $request)
    {

        $user = Auth::user();

        if ($user) {
            Auth::logout();
            LogoutLog::create([
                'user_id' => $user->id,
                'ip_address' => $request->ip(),
                'logout_at' => now(),
            ]);
            
            return response()->json(['success' => true, 'error' => null]);
        } else {
            return response()->json(['success' => false, 'error' => 'erro ao deslogar']);
        }
    }

    public function cadastro(Request $request)
    {
    }
}
