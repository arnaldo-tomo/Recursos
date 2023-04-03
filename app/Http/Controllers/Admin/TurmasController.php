<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Ano;
use App\Models\Escola\Turma;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;

class TurmasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestao_turmas()
    {

        $turmas = Turma::all();
        $cursos = Curso_classe::all();

        return view('admin.turmas.turmas', compact('turmas', 'cursos'));
    }

    public function salvar_turma()
    {

        Request::validated([
            'turma' => 'required',
            'curso_id' => 'required',
            'descricao' => 'required'
        ]);
        $curso = Curso_classe::find(Request::input('curso_id'));
        $turma = new Turma();
        $turma->turma = Request::input('turma');
        $turma->curso_id = Request::input('curso_id');
        $turma->codigo = $curso->codigo . '-' . Request::input('turma');
        $turma->descricao = Request::input('descricao');
        $turma->save();

        return redirect()->route('gestao_turmas')->with('turma', 'Parabens! a sua turma foi adicionada com sucesso.');
    }

    public function ver_turmas()
    {

        return view('admin.turmas.ver_turmas');
    }

    public function actualizar_turma($id)
    {

        $turma = Turma::findOrFail($id);
        $turma->turma = Request::input('turma');
        $turma->curso_id = Request::input('curso_id');
        $turma->codigo = Request::input('codigo');
        $turma->descricao = Request::input('descricao');
        $turma->save();

        return back()->with('actualizar', $id);
    }

    public function apagar_turma($id)
    {

        $turma = Turma::findOrFail($id);

        $turma->delete();

        return back()->with('Apagar', $id);
    }

    //Inicio do metodo que retorna a view para cadastrar uma nova turma
    public function nova_turma()
    {
        $cursos = Curso_classe::all();

        return view('admin.turmas.nova_turma', compact('cursos'));
    }
}
