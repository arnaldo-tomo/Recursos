<?php

namespace App\Http\Controllers\Docente;

use Request;
use App\Models\Escola\Turma;
use App\Models\Avaliacao\Notas;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao\Tipo_avaliacao;
use App\Models\Estudante\Dados_academicos;

class NotasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function criar_notas(){

        $cursos =  Curso_classe::all();
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('docente.notas.classificar',compact('cursos','tipos_avaliacoes'));
    }

    public function ver_notas(){
        $cursos =  Curso_classe::all();
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('docente.notas.notas',compact('cursos','tipos_avaliacoes'));
    }

    public function relatorio(){

        return view('docente.relatorios');
    }

    public function pesquisar_atribuir_notas(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));
        $tipo_avaliacao = Tipo_avaliacao::find(Request::input('tipo_avaliacao_id'));
        $turma = Turma::find(Request::input('turma_id'));
        $notas = Notas::where('curso_id',Request::input('curso_id'))->where('disciplina_id',Request::input('disciplina_id'))->where('tipo_avaliacao_id',Request::input('tipo_avaliacao_id'))->where('turma_id',Request::input('turma_id'))->get();
       
        return back()->with('disciplina',$disciplina)->with('turma',$turma)->with('tipo_avaliacao',$tipo_avaliacao)->with('notas', $notas);
    }

    public function pesquisar_notas(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));

        $turma = Turma::find(Request::input('turma_id'));
         $notas = Notas::where('curso_id',Request::input('curso_id'))->where('disciplina_id',Request::input('disciplina_id'))->where('tipo_avaliacao_id',Request::input('tipo_avaliacao_id'))->where('turma_id',Request::input('turma_id'))->get();
       
        return back()->with('disciplina',$disciplina)->with('turma',$turma)->with('notas',$notas);
    }

    public function pesquisar_estudante_notas(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));

        $turma = Turma::find(Request::input('turma_id'));
         $estudantes = Dados_academicos::where('turma_id', $turma->id)->get();
       
        return back()->with('disciplina',$disciplina)->with('turma',$turma)->with('estudantes',$estudantes);
    }

    public function pautas(){

        $tipos_avaliacoes = Tipo_avaliacao::all();
        $cursos = Curso_classe::all();

        return view('docente.notas.pauta_frequencia',compact('tipos_avaliacoes', 'cursos'));
    }

    public function pautas_exames(){

        $tipos_avaliacoes = Tipo_avaliacao::all();
        $cursos = Curso_classe::all();

        return view('docente.notas.pauta_exame',compact('tipos_avaliacoes', 'cursos'));
    }


    public function salvar_notas(){

        for($i=0; $i < sizeof(Request::input('nota')); $i++){

            
        $notas = new Notas();
        $notas->curso_id = Request::input('curso_id');
        $notas->disciplina_id = Request::input('disciplina_id');
        $notas->turma_id = Request::input('turma_id');
        $notas->tipo_avaliacao_id = Request::input('tipo_avaliacao_id');
        $notas->nota = Request::input('nota')[$i];
        $notas->nota_maxima = Request::input('nota_max')[$i];
        $notas->estudante_id = Request::input('estudante_id')[$i];
        $notas->nivel_id = Request::input('nivel_id')[$i];
        $notas->observacao = Request::input('observacao')[$i];
        $notas->save();
        }

        return back()->with('notas','Notas salvas com sucesso');

    }

    public function actualizar_nota($id){

           
        $notas = Notas::findOrFail($id);
        $notas->nota = Request::input('nota');
        $notas->nota_maxima = Request::input('nota_max');
        $notas->observacao = Request::input('observacao');
        $notas->save();
        

        return back()->with('actualizar',$id); 

    }


    public function apagar_nota($id){
        
        $notas =  Notas::findOrFail($id);
      
        $notas->delete();
        
        return back()->with('Apagar',$id);

    }

}
