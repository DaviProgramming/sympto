<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


Route::get('/', function () {

    $user = Auth::user();

    if(!$user){

        return redirect()->route('pagina.login');

    }else{

        return view('pages.home');

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


Route::get('/consultas', function(){

    $user = Auth::user();


    if($user){

        return view('pages.consultas');


    }else{


        return redirect()->route('pagina.login');



    }



});



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




});


Route::post('/evento/logout', function(Request $request){


    $user = Auth::user();

    if($user){

        Auth::logout();

        return response()->json(['success' => true, 'error' => null]);

    }else{


        return response()->json(['success' => false, 'error' => 'erro ao deslogar']);

    }


});