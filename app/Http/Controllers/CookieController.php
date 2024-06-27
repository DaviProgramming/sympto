<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\cookieTempoPagina;

class CookieController extends Controller
{
    public function tempoPagina(Request $request){

        try{

            $user = Auth::user();

        cookieTempoPagina::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'pagina' => $request->pathAtual,
            'tempo_pagina'=> $request->tempoDecorrido,
        ]);

        return response()->json(['success' => true, 'return' => $request->all()]);


        }catch(\Exception $e){

            return response()->json(['success' => false, 'return' => $e->getMessage()]);

        }

        

    }
}
