<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function tempoPagina(Request $request){

        return response()->json(['success' => true, 'return' => $request->all()]);


    }
}
