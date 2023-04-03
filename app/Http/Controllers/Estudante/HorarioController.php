<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Models\Calendario\Dias;
use App\Models\Calendario\Periodo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function horarios(){


        $horarios = Auth::user()->dados_academicos_estudante->turma->horarios;

        $periodos = Periodo::all();
        $dias = Dias::all();
   
         return view('estudante.horarios',compact('horarios','periodos','dias'));
    }

}
