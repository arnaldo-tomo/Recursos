<?php

namespace App\Http\Controllers\Estudante;

use Request;
use App\Models\Escola\Disciplina;
use App\Models\Avaliacao\Avaliacao;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao\Tipo_avaliacao;

class AvaliacoesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function download_avaliacoes(){  
        $avaliacoes = Auth::user()->dados_academicos_estudante->turma->avaliacoes;
        $disciplinas = Auth::user()->dados_academicos_estudante->curso->disciplinas;
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('estudante.avaliacoes.avaliacoes', compact('avaliacoes','disciplinas','tipos_avaliacoes'));
    }

    public function upload_avaliacoes(){
        $avaliacoes = Auth::user()->dados_academicos_estudante->turma->avaliacoes;
        $disciplinas = Auth::user()->dados_academicos_estudante->curso->disciplinas;
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('estudante.avaliacoes.upload', compact('avaliacoes','disciplinas','tipos_avaliacoes'));
    }

    public function pesquisar_avaliacoes(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));
        $avaliacoes = Avaliacao::where('disciplina_id',Request::input('disciplina_id'))->where('tipo_avaliacao_id',Request::input('tipo_avaliacao_id'))->where('turma_id',Auth::user()->dados_academicos_estudante->turma_id)->get();
       
        return back()->with('avaliacoes',$avaliacoes)->with('disciplina',$disciplina);
    }
}
