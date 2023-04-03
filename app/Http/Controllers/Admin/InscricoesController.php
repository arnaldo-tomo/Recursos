<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Ano;
use App\Models\Avaliacao\Notas;
use App\Models\Estudante\Inscricao;
use App\Http\Controllers\Controller;
use App\Models\Avaliacao\Notas_exame;
use App\Models\Avaliacao\Tipo_avaliacao;
use App\Models\Escola\Periodo_academico;
use App\Models\Estudante\Dados_academicos;
use App\Models\Estudante\Inscricao_cadeira;

class InscricoesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inscricoes(){

        $estudantes = Dados_academicos::all();


        return view('admin.estudantes.inscricoes', compact('estudantes'));
    }



    public function ver_inscricoes($id){

        $estudante = Dados_academicos::findOrFail($id);
        $periodos = Periodo_academico::all();
        $ano_letivo = Ano::all()->last();
        

        return view('admin.estudantes.ver_inscricoes', compact('estudante','periodos','ano_letivo'));
    }


    public function nova_inscricao(){

     $estudante = Dados_academicos::find(Request::input('estudante_id'));
    $cont = 0;
     foreach($estudante->matriculas as $mat){
      
         if($mat->ano_letivo_id==Request::input('ano_letivo_id')){
             $cont++;
         }
     }
     if($cont==0){

        return back()->with('inscricao_matricula','Não efetuou matricula');
     }else{

       
        return redirect()->route('inscricao', ['id'=> $estudante->id, 'id1'=>Request::input('periodo_id')]);       

     }

    }


    public function inscricao($id,$id1){

        $estudante = Dados_academicos::find($id);
        $periodo = Periodo_academico::find($id1);
        $ano_letivo = Ano::all()->last();


        return view('admin.estudantes.inscricao', compact('estudante','periodo','ano_letivo'));
    }


    public function inscricao_cadeiras(){

        $tipos_avaliacoes = Tipo_avaliacao::all();
        $disciplinas_normais = Request::input('disciplinas_normais');
        $disciplinas_atraso = Request::input('disciplinas_atraso');

        $inscricao = new Inscricao();
        $inscricao->ano_letivo_id = Request::input('ano_letivo_id');
        $inscricao->nivel_id = Request::input('nivel_id');
        $inscricao->periodo_id = Request::input('periodo_id');
        $inscricao->estudante_id = Request::input('estudante_id');
        $inscricao->data= date('Y-m-d');
        $inscricao->save();

        for($i=0; $i < sizeof($disciplinas_normais); $i++){

            $medias_finais = new Notas_exame();
            $medias_finais->disciplina_id = $disciplinas_normais[$i];
            $medias_finais->curso_id = Request::input('curso_id');
            $medias_finais->nivel_id = Request::input('nivel_id');
            $medias_finais->periodo_id = Request::input('periodo_id');
            $medias_finais->estudante_id = Request::input('estudante_id');
            $medias_finais->save();

            foreach($tipos_avaliacoes as $tipo_avaliacao){

                $testes = new Notas();
                $testes->curso_id = Request::input('curso_id');
                $testes->nivel_id = Request::input('nivel_id');
                $testes->disciplina_id = $disciplinas_normais[$i];
                $testes->tipo_avaliacao_id = $tipo_avaliacao->id;
                $testes->estudante_id = $medias_finais->estudante_id;
                $testes->media_final_id = $medias_finais->id;
                $testes->save();
                
            }

            $inscricao_cadeiras = new Inscricao_cadeira();
            $inscricao_cadeiras->inscricao_id = $inscricao->id;
            $inscricao_cadeiras->media_final_id = $medias_finais->id;
            $inscricao_cadeiras->save();

        }
// disciplinas em atraso
        for($i=0; $i < sizeof($disciplinas_atraso); $i++){

            $media_final = Notas_exame::where('estudante_id', Request::input('estudante_id'))->where('disciplina_id',$disciplinas_atraso[$i])->first();
            
            if($media_final->observacao == 1){
                $media_final->nota_exame_normal = null;
                $media_final->nota_exame_recorrencia = null;
                $media_final->media_final = null;
                $media_final->estado = null;
                $media_final->save();

                $inscricao_cadeiras = new Inscricao_cadeira();
                $inscricao_cadeiras->inscricao_id = $inscricao->id;
                $inscricao_cadeiras->media_final_id = $medias_finais->id;
                $inscricao_cadeiras->nota_frequencia = $media_final->nota_frequencia;
                $inscricao_cadeiras->save();
            }else{

                $testes = Notas::where('media_final_id',$media_final->id)->get();

                foreach($testes as $teste){

                    $teste->nota =null;
                    $teste->observacao =null;
                    $teste->save();
                }
                $media_final->nota_exame_normal = null;
                $media_final->nota_exame_recorrencia = null;
                $media_final->media_final = null;
                $media_final->estado = null;
                $media_final->save();

                $inscricao_cadeiras = new Inscricao_cadeira();
                $inscricao_cadeiras->inscricao_id = $inscricao->id;
                $inscricao_cadeiras->media_final_id = $medias_finais->id;
                $inscricao_cadeiras->save();
            }
        }

        return redirect()->route('ver_inscricoes', ['id'=> Request::input('estudante_id')])->Request::only('estudante_id'); 
    }


}
