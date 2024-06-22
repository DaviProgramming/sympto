<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sintoma;


Route::get('/', function () {

    $user = Auth::user();



    if(!$user){


        return redirect()->route('pagina.login');

    }else{

        Session::put('current_page', 'home');
        $currentPage = session('current_page'); 


        return view('pages.home', ['current_page' => $currentPage]);

    }

})->name('pagina.home');


Route::get('/login', function () {

    $user = Auth::user();

    if($user){

        return redirect()->route('pagina.home');


    }else{


    return view('pages.login');



    }

})->name('pagina.login');


Route::get('/nova-consulta', function(){

    $user = Auth::user();

    if($user){

        Session::put('current_page', 'nova-consulta');

        $currentPage = session('current_page');

        $sintomas = Sintoma::all();

        return view('pages.consultas', ['sintomas' => $sintomas, 'user' => $user, 'current_page' => $currentPage]);


    }else{


        return redirect()->route('pagina.login');



    }


})->name('pagina.nova-consulta');



Route::post('/evento/login', function(Illuminate\Http\Request $request){
 
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




})->name('evento.login');


Route::post('/evento/logout', function(Request $request){


    $user = Auth::user();

    if($user){

        Auth::logout();

        return response()->json(['success' => true, 'error' => null]);

    }else{


        return response()->json(['success' => false, 'error' => 'erro ao deslogar']);

    }


})->name('evento.logout');