<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use App\Models\Escola\Curso_disciplina;
use App\Models\Docente\Dados_academicos;
use App\Models\Escola\Disciplina_docente;
use App\Models\Escola\Nivel_academico;
use App\Models\Escola\Periodo_academico;

class DisciplinasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestao_disciplina()
    {

        $disciplinas =  Disciplina::all();
        $cursos =  Curso_classe::all();
        return view('admin.disciplinas.disciplinas', compact('disciplinas', 'cursos'));
    }


    public function salvar_disciplina()
    {

        Request::validated([
            'nome' => 'required',
            'codigo' => 'required',
            'descricao' => 'required'
        ]);

        $disciplina =  new Disciplina();
        $disciplina->nome = Request::input('nome');
        $disciplina->codigo = Request::input('codigo');
        $disciplina->descricao = Request::input('descricao');
        $disciplina->save();

        return back()->with('mensagem', ' Disciplina adicionado com sucesso');
    }

    public function ver_disciplina()
    {
        $disciplinas =  Disciplina::all();
        $cursos =  Curso_classe::all();
        $docentes = Dados_academicos::all();
        $nivel = Nivel_academico::all();
        $semestre = Periodo_academico::all();
        $conexao=Curso_disciplina::all();
        return view('admin.disciplinas.ver_disciplinas', compact('disciplinas', 'cursos', 'docentes', 'nivel', 'semestre','conexao'));
    }


    public function conectar_docentes()
    {

        for ($i = 0; $i < sizeof(Request::input('turma_id')); $i++) {

            $diciplina_docente = new Disciplina_docente();

            $diciplina_docente->docente_id = Request::input('docente_id');
            $diciplina_docente->disciplina_id = Request::input('disciplina_id');
            $diciplina_docente->nivel_id = Request::input('nivel_id');
            $diciplina_docente->turma_id = Request::input('turma_id')[$i];
            $diciplina_docente->periodo_id = Request::input('periodo_id');
            $diciplina_docente->save();
        }

        return back()->with('mensagem_docente', '  Conexão efetuada com sucesso');
    }

    public function conectar_cursos()
    {

        for ($i = 0; $i < sizeof(Request::input('disciplina_id')); $i++) {

            $diciplina_curso = new Curso_disciplina();

            $diciplina_curso->curso_id = Request::input('curso_id');
            $diciplina_curso->nivel_id = Request::input('nivel_id');
            $diciplina_curso->disciplina_id = Request::input('disciplina_id');
            $diciplina_curso->save();
        }

        return back()->with('mensagem_curso', 'Conexão efetuada com sucesso');
    }

    public function apagar_disciplina($id)
    {

        $disciplina =  Disciplina::findOrFail($id);

        $disciplina->delete();

        return back()->with('Apagar', $id);
    }

    public function actualizar_disciplina($id)
    {

        $disciplina =  Disciplina::findOrFail($id);
        $disciplina->nome = Request::input('nome');
        $disciplina->codigo = Request::input('codigo');
        $disciplina->descricao = Request::input('descricao');
        $disciplina->save();


        return back()->with('actualizar', $id);
    }
}
