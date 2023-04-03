<?php

namespace App\Http\Controllers\Docente;

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

    public function horario_docentes(){

        $horarios = Auth::user()->dados_academicos_docente->horarios;

        $periodos = Periodo::all();
        $dias = Dias::all();
        return view('docente.horarios',compact('horarios','periodos','dias'));
    }
}
