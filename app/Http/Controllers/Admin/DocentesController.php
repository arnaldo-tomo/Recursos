<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\User;
use App\Models\Genero;
use App\Models\Escola\Turma;
use App\Models\Universidade;
use App\Models\Docente\Material;
use App\Models\Escola\Disciplina;
use Illuminate\Support\Facades\DB;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Docente\Dados_contacto;
use App\Models\Escola\Nivel_academico;
use App\Models\Docente\Dados_academicos;
use App\Models\Escola\Periodo_academico;
use App\Models\Escola\Disciplina_docente;
use App\Models\Docente\Dados_nivel_academico;

class DocentesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detalhes_docentes($id)
    {

        $dados_academicos = Dados_academicos::find($id);
        $dados_contacto = Dados_contacto::find($id);
        $user = User::find($id);
        return view('admin.docentes.detalhes', compact('dados_academicos', 'dados_contacto', 'user'));
    }

    public function todos_docentes()
    {

        $docentes =  Dados_academicos::all();
        $generos = Genero::all();
        $niveis_academicos = Dados_nivel_academico::all();
        $universidades = Universidade::all();
        return view('admin.docentes.docente', compact('docentes', 'generos', 'niveis_academicos', 'universidades'));
    }


    public function disciplinas()
    {

        $docentes = Dados_academicos::all();
        $niveis = Nivel_academico::all();
        $disciplinas = Disciplina::all();
        $curso = Curso_classe::all();
        $turma = Turma::all();
        $periodo_academico = Periodo_academico::all();

        return view('admin.docentes.disciplinas', compact('docentes', 'niveis', 'disciplinas', 'curso', 'turma', 'periodo_academico'));
    }
    public function novo_docente()
    {

        $generos = Genero::all();
        $niveis_academicos = Dados_nivel_academico::all();
        $universidades = Universidade::all();
        return view('admin.docentes.novo_docente', compact('generos', 'niveis_academicos', 'universidades'));
    }


    public function salvar_docente()
    {

        Request::validate([
            'apelido' => 'required',
            'name' => 'required',
            'genero_id' => 'required',
            'data_nascimento' => 'required',
            'contacto' => 'required',
            'email' => 'required',
            'morada' => 'required',
            'morada2' => 'required',
            'nacionalidade' => 'required',
            'localidade' => 'required',
            'provincia' => 'required',
            'area_formacao' => 'required',
            'nivel_academico_id' => 'required',
            'ano_conclusao' => 'required',
            'media' => 'required',
        ]);

        $dados_usuario = new User();
        $dados_usuario->apelido = Request::input('apelido');
        $dados_usuario->name = Request::input('name');
        $dados_usuario->genero_id = Request::input('genero_id');
        $dados_usuario->data_nasc = Request::input('data_nascimento');
        $dados_usuario->contacto = Request::input('contacto');
        $dados_usuario->email = Request::input('email');
        $dados_usuario->password = Hash::make(Request::input('contacto'));

        $dados_usuario->user_access_id = 2;

        if (Request::file('foto') != null) {
            $filename = Request::file('foto')->getClientOriginalName();
            $link = "fotos/docentes/" . $filename;
            $dados_usuario->foto = $link;
            $foto = Request::file('foto');
            $foto->move('fotos/docentes', $filename);
        }

        $dados_usuario->save();

        $dados_contacto = new Dados_contacto();

        $dados_contacto->morada = Request::input('morada');
        $dados_contacto->morada2 = Request::input('morada2');
        $dados_contacto->nacionalidade = Request::input('nacionalidade');
        $dados_contacto->localidade = Request::input('localidade');
        $dados_contacto->provincia = Request::input('provincia');
        $dados_contacto->email = Request::input('email');
        $dados_contacto->professor_id = $dados_usuario->id;
        $dados_contacto->save();


        $dados_academicos = new Dados_academicos();
        $dados_academicos->codigo = 'FD-' . date("Y") . $dados_usuario->id;
        $dados_academicos->area_formacao = Request::input('area_formacao');
        $dados_academicos->nivel_academico_id = Request::input('nivel_academico_id');
        $dados_academicos->universidade_id = Request::input('universidade_id');
        $dados_academicos->ano_conclusao = Request::input('ano_conclusao');
        $dados_academicos->media = Request::input('media');
        $dados_academicos->professor_id = $dados_usuario->id;
        $dados_academicos->save();

        return back()->with('docente', $dados_academicos->id);
    }

    public function actualizar_docente($id)
    {

        $docente = User::findOrFail($id);
        $docente->apelido = Request::input('apelido');
        $docente->name = Request::input('name');
        $docente->genero_id = Request::input('genero_id');
        $docente->contacto = Request::input('contacto');
        $docente->email = Request::input('email');

        $docente->user_access_id = 2;

        $docente->save();



        $dados_academicos = Dados_academicos::find($docente->dados_academicos_docente->id);
        $dados_academicos->nivel_academico_id = Request::input('nivel_academico_id');
        $dados_academicos->universidade_id = Request::input('universidade_id');
        $dados_academicos->ano_conclusao = Request::input('ano_conclusao');
        $dados_academicos->professor_id = $docente->id;
        $dados_academicos->save();

        return back()->with('docente', $dados_academicos->id);
    }


    public function apagar_docente($id)
    {

        $estudante = User::findOrFail($id);

        $estudante->delete();

        return back();
    }
}
