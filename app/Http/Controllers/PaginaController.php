<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 


use App\Models\User;
use App\Models\Sintoma;


class PaginaController extends Controller
{
    public function home()
    {

        $user = Auth::user();

        if (!$user) {

            return redirect()->route('pagina.login');
        } else {

            Session::put('current_page', 'home');
            $currentPage = session('current_page');

            return view('pages.home', ['current_page' => $currentPage]);
        }
    }

    public function login()
    {

        $user = Auth::user();

        if ($user) {

            return redirect()->route('pagina.home');
        } else {


            return view('pages.login');
        }
    }

    public function novaConsulta()
    {

        $user = Auth::user();

        if ($user) {

            Session::put('current_page', 'nova-consulta');

            $currentPage = session('current_page');

            $sintomas = Sintoma::all();

            return view('pages.consultas', ['sintomas' => $sintomas, 'user' => $user, 'current_page' => $currentPage]);
        } else {


            return redirect()->route('pagina.login');
        }
    }
}
