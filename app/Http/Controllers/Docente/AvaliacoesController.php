<?php

namespace App\Http\Controllers\Docente;

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


    public function nova_avaliacao(){

        $cursos = Curso_classe::all();
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('docente.avaliacoes.nova_avaliacao', compact('cursos','tipos_avaliacoes'));
    }

    public function todas_avaliacoes(){

        $cursos = Curso_classe::all();
        $tipos_avaliacoes = Tipo_avaliacao::all();
        return view('docente.avaliacoes.avaliacoes', compact('cursos','tipos_avaliacoes'));
    }



    public function salvar_avaliacao(){


        $avaliacoes = new Avaliacao();

        $avaliacoes->curso_id = Request::input('curso_id');
        $avaliacoes->turma_id = Request::input('turma_id');
        $avaliacoes->disciplina_id = Request::input('disciplina_id');
        $avaliacoes->docente_id = Auth::user()->dados_academicos_docente->id;
        $avaliacoes->tipo_avaliacao_id = Request::input('tipo_avaliacao_id');
        $avaliacoes->data = now();
        $avaliacoes->observacao = Request::input('observacao');
        $avaliacoes->publicar = Request::input('publicar');
      
        if(Request::input('publicar')==1){
            $avaliacoes->estado = 1;
            $avaliacoes->data_entrega = Request::input('data_entrega');
        }else{
            $avaliacoes->estado = 0;
        }
      

        if(Request::file('ficheiro') != null){
            $filename = Request::file('ficheiro')->getClientOriginalName();
            $link = "documentos/avaliacoes/".$filename;
            $avaliacoes->ficheiro = $link;
            $avaliacao = Request::file('ficheiro');
            $avaliacao->move('documentos/avaliacoes',$filename);
            }

            $avaliacoes->save();
            
            return back()->with('avaliacao','Avaliação criada com sucesso');
    }


    public function pesquisar_avaliacoes(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));
        $avaliacoes = Avaliacao::where('curso_id',Request::input('curso_id'))->where('disciplina_id',Request::input('disciplina_id'))->where('tipo_avaliacao_id',Request::input('tipo_avaliacao_id'))->get();
       
        return back()->with('avaliacoes',$avaliacoes)->with('disciplina',$disciplina);
    }

    public function apagar_avaliacao($id){
        
        $avaliacao =  Avaliacao::findOrFail($id);
      
        $avaliacao->delete();
        
        return back()->with('Apagar',$id);

    }


    public function actualizar_avaliacao($id){

        $avaliacao = Avaliacao::findOrFail($id);

        $avaliacao->curso_id = Request::input('curso_id');
        $avaliacao->turma_id = Request::input('turma_id');
        $avaliacao->disciplina_id = Request::input('disciplina_id');
        $avaliacao->tipo_avaliacao_id = Request::input('tipo_avaliacao_id');
        $avaliacao->data = now();
        $avaliacao->observacao = Request::input('observacao');
        $avaliacao->publicar = Request::input('publicar');
      
        if(Request::input('publicar')==1){
            $avaliacao->estado = 1;
            $avaliacao->data_entrega = Request::input('entrega');
        }else{
            $avaliacao->estado = 0;
        }

        if(Request::file('ficheiro') != null){
            $filename = Request::file('ficheiro')->getClientOriginalName();
            $link = "documentos/avaliacoes/".$filename;
            $avaliacoes->ficheiro = $link;
            $avaliacao = Request::file('ficheiro');
            $avaliacao->move('documentos/avaliacoes',$filename);
            }

            $avaliacao->save();
            
            return back()->with('actualizar',$id); 
    }
    

}
