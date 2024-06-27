<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Sintoma;
use App\Models\User;
use App\Models\Consulta;


class ConsultaController extends Controller
{
    public function novaConsulta(Request $request){

        $sintomas = $request->sintomas;
        $exames = $request->exames;

        try {

            $consulta = new Consulta();
            $consulta->id_paciente = Auth::user()->id;
            $consulta->status_exames = 'empty';
            $consulta->status_consulta = 'agendada';
            $consulta->sintomas = json_encode($sintomas); 
            $consulta->exames = $exames;
            $consulta->save();
        
            return response()->json(['success' => true , 'message' => 'Consulta agendada com sucesso!'], 200);
        
        } catch (\Exception $e) {

            return response()->json(['success' => false , 'error' => 'Erro ao agendar consulta: ' . $e->getMessage()]);

        }

    }


    public function apagaConsulta(Request $request){

        
    }
}
