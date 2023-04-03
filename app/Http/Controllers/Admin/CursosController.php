<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Ano;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use App\Models\Docente\Dados_academicos;
use App\Models\Escola\Nivel_academico;
use App\Models\Propinas\Propinas;

class CursosController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestao_cursos(){

        $cursos = Curso_classe::all();
        $docentes = Dados_academicos::all();
        $anos = Ano::all();
        $propinas = Propinas::all();

        return view('admin.cursos.cursos',compact('cursos','docentes','anos','propinas'));
    }


    public function salvar_curso(){

        $curso = new Curso_classe();
        $curso->nome = Request::input('nome');
        $curso->codigo = Request::input('codigo');
        $curso->descricao = Request::input('descricao');
        $curso->docente_id = Request::input('docente_id');
        $curso->ano_id = Request::input('ano_id');
        $curso->propina_id = Request::input('propina_id');

        $curso->save();

        return back()->with('curso',Request::input('nome'));
    }

    public function ver_cursos(){

        return view('admin.cursos.ver_cursos');
    }

    public function actualizar_curso($id){

        $curso = Curso_classe::findOrFail($id);
        $curso->nome = Request::input('nome');
        $curso->codigo = Request::input('codigo');
        $curso->descricao = Request::input('descricao');
        $curso->docente_id = Request::input('docente_id');
        $curso->ano_id = Request::input('ano_id');
        $curso->propina_id = Request::input('propina_id');
        $curso->save();

        return back()->with('actualizar', $id);
    }

    public function apagar_curso($id){

        $curso = Curso_classe::findOrFail($id);

        $curso->delete();
        
        return back()->with('Apagar',$id);

    }

    public function mostrar_nivel(){
        $curso_id = Request::get('curso_id');
        $niveis = Nivel_academico::where('curso_id',$curso_id)->get();      
        return response()->json($niveis);
    }


}
