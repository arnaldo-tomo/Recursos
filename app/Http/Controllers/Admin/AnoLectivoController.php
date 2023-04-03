<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Requests\validacao;
use App\Models\Ano;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use App\Models\Escola\Curso_disciplina;

class AnoLectivoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function ano_lectivo()
    {

        $anos = Ano::all();

        return view('admin.ano_letivo', compact('anos'));
    }


    public function salvar_ano_lectivo(Request $request)
    {

        // validadacao de campos
        Request::validate([
            'ano_letivo' => 'required',
            'descricao' => 'required',
            'inicio_aulas' => 'required',
            'termino_aulas' => 'required',
        ]);
        $contador = 0;
        $todos_anos = Ano::all();
        $ano_anterior = Ano::all()->last();

        foreach ($todos_anos as $ano) {

            if ($ano->Ano == Request::input('ano_letivo')) {
                $contador++;
            }
        }

        if ($contador == 0) {
            $ano_anterior->estado = 2;
            $ano_anterior->save();
            $ano_letivo = new Ano();
            $ano_letivo->Ano = Request::input('ano_letivo');
            $ano_letivo->descricao = Request::input('descricao');
            $ano_letivo->inicio_aulas = Request::input('inicio_aulas');
            $ano_letivo->termino_aulas = Request::input('termino_aulas');
            $ano_letivo->estado = 1;
            $ano_letivo->save();

            foreach ($ano_anterior->cursos as $curso) {
                $cursos = new Curso_classe();
                $cursos->nome = $curso->nome;
                $cursos->codigo = $curso->codigo;
                $cursos->descricao = $curso->descricao;
                $cursos->docente_id = $curso->docente_id;
                $cursos->ano_id = $ano_letivo->id;
                $cursos->propina_id = $curso->propina_id;
                $cursos->save();

                foreach ($curso->disciplinas as $disciplina) {

                    $curso_disciplinas = new Curso_disciplina();
                    $curso_disciplinas->curso_id =  $disciplina->curso_id;
                    $curso_disciplinas->nivel_id =  $disciplina->nivel_id;
                    $curso_disciplinas->periodo_id =  $disciplina->periodo_id;
                    $curso_disciplinas->disciplina_id =  $disciplina->disciplina_id;
                    $curso_disciplinas->save();
                }
            }
            return back()->with('ano', 'Ano lectivo iniciado com sucesso');
        } else {

            return back()->with('ano_existente', 'Esse ano já existe');
        }
    }
}
