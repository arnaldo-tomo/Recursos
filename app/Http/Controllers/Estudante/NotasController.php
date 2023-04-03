<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao\Tipo_avaliacao;

class NotasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    // public function notas_testes(){

    //     return view('Estudante.notas.notas');
    // }

    // public function notas_exames(){

    //     return view('estudante.notas.notas_exames');
    // }

    public function notas_frequencia(){

        $tipos_avaliacoes = Tipo_avaliacao::all();
        $disciplinas = Auth::user()->dados_academicos_estudante->curso->disciplinas;
        $notas = Auth::user()->dados_academicos_estudante->notas;

        return view('estudante.notas.notas_frequencia',compact('tipos_avaliacoes', 'disciplinas','notas'));
    }

    public function notas_exame(){

        $tipos_avaliacoes = Tipo_avaliacao::all();
        $exames = Auth::user()->dados_academicos_estudante->exames;

        return view('estudante.notas.notas_exame',compact('tipos_avaliacoes', 'exames'));
    }



}
