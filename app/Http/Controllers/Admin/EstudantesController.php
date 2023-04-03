<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Ano;
use App\Models\User;
use App\Models\Genero;
use App\Models\Escola\Turma;
use App\Models\Avaliacao\Notas;
use App\Models\Escola\Matricula;
use App\Models\Calendario\Regime;
use App\Models\Propinas\Propinas;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudante\Encarregado;
use App\Models\Avaliacao\Tipo_avaliacao;
use App\Models\Estudante\Dados_filiacao;
use App\Models\Estudante\Dados_academicos;
use App\Models\Propinas\Pagamento_propinas;

class EstudantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function todos_estudantes()
    {
        $estudantes = Dados_academicos::all();
        $cursos = Curso_classe::all();
        $generos = Genero::all();
        $anos = Ano::ORDERBY('id', 'DESC')->get();


        return view('admin.estudantes.estudante', compact('estudantes', 'cursos', 'generos', 'anos'));
    }

    public function renovar_matricula($id)
    {
        $ano = Ano::find(Request::input('ano_letivo_id'));
        $estudante = Dados_academicos::find($id);
        $estudante->ano_lectivo_id = Request::input('ano_letivo_id');
        //  verificar se aprovou todas sisciplinas para saber se transitou de nivel
        $estudante->save();

        $matricula = new Matricula();

        $matricula->estudante_id = $estudante->id;
        $matricula->curso_id = $estudante->curso_id;
        $matricula->ano_letivo_id = Request::input('ano_letivo_id');
        $matricula->talao = Request::input('talao');
        $matricula->cod_maricula = $ano->Ano . "MAT" . $estudante->id;

        $matricula->save();

        //aqui vai entrar inscrição de disciplinas para instituicoes do nivel medio ou secundário
        // deve se ter em conta que para determinar o nivel do esudante deve se verificar se aprovou as disciplinas do nivel anterior

        return back()->with('matricula', $matricula);
    }
    // public function novo_estudante(){

    //     $generos = Genero::all();
    //     $cursos = Curso_classe::all();
    //     $ano_lectivo = Ano::all()->last();
    //     $regimes = Regime::all();


    //     return view('admin.estudantes.novo_estudante', compact('cursos','generos','ano_lectivo','regimes'));

    //     // return view('admin.estudantes.estudante', compact('estudantes', 'cursos', 'generos'));
    // }

    public function novo_estudante()
    {
        $generos = Genero::all();
        $cursos = Curso_classe::all();
        $ano_lectivo = Ano::all()->last();
        $regimes = Regime::all();
        $Turmas = Turma::all();

        return view('admin.estudantes.novo_estudante', compact('cursos', 'generos', 'ano_lectivo', 'regimes', 'Turmas'));
    }

    public function turmas()
    {
        $curso_id = Request::get('curso_id');
        $turmas = Turma::where('curso_id', $curso_id)->get();
        return response()->json($turmas);
    }

    public function salvar_estudante()
    {
        // validadacao de campos
        Request::validate([
            'apelido' => 'required',
            'name' => 'required',
            'genero_id' => 'required',
            'data_nascimento' => 'required',
            'contacto' => 'required',
            'email' => 'required',
            'codigo' => 'required',
            'password' => 'required',
            'data_nascimento' => 'required',
            'bi' => 'required',
            'morada' => 'required',
            'distrito' => 'required',
            'provincia' => 'required',
            'foto' => 'required',
            'nome_pai' => 'required',
            'profissao_pai' => 'required',
            'morada_pai' => 'required',
            'local_trabalho_pai' => 'required',
            'nome_mae' => 'required',
            'profissao_mae' => 'required',
            'morada_mae' => 'required',
            'local_trabalho_mae' => 'required',
            'nome_enc' => 'required',
            'email_enc' => 'required',
            'profissao_enc' => 'required',
            'morada_enc' => 'required',
            'local_trabalho_enc' => 'required',
            'contacto_enc' => 'required',
            'contacto_alternativo_enc' => 'required',
            'ano_lectivo_id' => 'required',
            'curso_id' => 'required',
            'regime_id' => 'required',
            'ano_lectivo_id' => 'required',
            'curso_id' => 'required',
            'turma_id' => 'required',
            'ano_lectivo_id' => 'required',
            'ano_lectivo_id' => 'required',
            'ano_lectivo_id' => 'required',
            'ano_lectivo_id' => 'required',
        ]);
        $turma = Turma::find(Request::input('id'));

        $dados_usuario = new User();
        $dados_usuario->apelido = Request::input('apelido');
        $dados_usuario->name = Request::input('name');
        $dados_usuario->genero_id = Request::input('genero_id');
        $dados_usuario->data_nasc = Request::input('data_nascimento');
        $dados_usuario->contacto = Request::input('contacto');
        $dados_usuario->email = Request::input('email');
        $dados_usuario->password = Hash::make(Request::input('codigo'));
        $dados_usuario->password = Hash::make(Request::input('password'));
        $dados_usuario->bilhete_identificacao = Request::input('bi');
        $dados_usuario->morada = Request::input('morada');
        $dados_usuario->distrito = Request::input('distrito');
        $dados_usuario->provincia = Request::input('provincia');
        $dados_usuario->user_access_id = 1;

        if (Request::file('foto') != null) {
            $filename = Request::file('foto')->getClientOriginalName();
            $link = "fotos/estudantes/" . $filename;
            $dados_usuario->foto = $link;
            $foto = Request::file('foto');
            $foto->move('fotos/estudantes', $filename);
        }

        $dados_usuario->save();


        $dados_filiacao = new Dados_filiacao();
        $dados_filiacao->nome_pai = Request::input('nome_pai');
        $dados_filiacao->profissao_pai = Request::input('profissao_pai');
        $dados_filiacao->morada_pai = Request::input('morada_pai');
        $dados_filiacao->local_trabalho_pai = Request::input('local_trabalho_pai');

        $dados_filiacao->nome_mae = Request::input('nome_mae');
        $dados_filiacao->profissao_mae = Request::input('profissao_mae');
        $dados_filiacao->morada_mae = Request::input('morada_mae');
        $dados_filiacao->local_trabalho_mae = Request::input('local_trabalho_mae');

        $dados_filiacao->estudante_id = $dados_usuario->id;

        $dados_filiacao->save();

        $dados_encarregado = new Encarregado();
        $dados_encarregado->nome = Request::input('nome_enc');
        $dados_encarregado->email = Request::input('email_enc');
        $dados_encarregado->profissao = Request::input('profissao_enc');
        $dados_encarregado->morada = Request::input('morada_enc');
        $dados_encarregado->local_trabalho = Request::input('local_trabalho_enc');
        $dados_encarregado->contacto = Request::input('contacto_enc');
        $dados_encarregado->contacto_alternativo = Request::input('contacto_alternativo_enc');
        $dados_encarregado->estudante_id = $dados_usuario->id;
        $dados_encarregado->save();


        $ano = Ano::find(Request::input('ano_lectivo_id'));
        $dados_academicos = new Dados_academicos();
        $dados_academicos->codigo = $ano->Ano . Request::input('curso_id') . $dados_usuario->id;
        $dados_academicos->curso_id = Request::input('curso_id');
        $dados_academicos->regime_id = Request::input('regime_id');
        $dados_academicos->estudante_id = $dados_usuario->id;
        $dados_academicos->ano_lectivo_id = Request::input('ano_lectivo_id');
        $dados_academicos->save();

        for ($i = 1; $i < 13; $i++) {
            $foto->move('fotos/estudantes', $filename);
        }

        $dados_usuario->save();

        $dados_filiacao = new Dados_filiacao();
        $dados_filiacao->nome_pai = Request::input('nome_pai');
        $dados_filiacao->profissao_pai = Request::input('profissao_pai');
        $dados_filiacao->morada_pai = Request::input('morada_pai');
        $dados_filiacao->local_trabalho_pai = Request::input('local_trabalho_pai');

        $dados_filiacao->nome_mae = Request::input('nome_mae');
        $dados_filiacao->profissao_mae = Request::input('profissao_mae');
        $dados_filiacao->morada_mae = Request::input('morada_mae');
        $dados_filiacao->local_trabalho_mae = Request::input('local_trabalho_mae');

        $dados_filiacao->estudante_id = $dados_usuario->id;

        $dados_filiacao->save();

        $dados_encarregado = new Encarregado();
        $dados_encarregado->nome = Request::input('nome_enc');
        $dados_encarregado->email = Request::input('email_enc');
        $dados_encarregado->profissao = Request::input('profissao_enc');
        $dados_encarregado->morada = Request::input('morada_enc');
        $dados_encarregado->local_trabalho = Request::input('local_trabalho_enc');
        $dados_encarregado->contacto = Request::input('contacto_enc');
        $dados_encarregado->contacto_alternativo = Request::input('contacto_alternativo_enc');
        $dados_encarregado->estudante_id = $dados_usuario->id;
        $dados_encarregado->save();

        $ano = Ano::find(Request::input('ano_lectivo_id'));
        $dados_academicos = new Dados_academicos();
        $dados_academicos->codigo = $ano->Ano . Request::input('curso_id') . $dados_usuario->id;
        $dados_academicos->curso_id = Request::input('curso_id');
        $dados_academicos->turma_id = Request::input('turma_id');

        $dados_academicos->estudante_id = $dados_usuario->id;
        $dados_academicos->ano_lectivo_id = Request::input('ano_lectivo_id');
        $dados_academicos->save();

        for ($i = 1; $i < 13; $i++) {
            $estudante_pagamento = new Pagamento_propinas();
            $estudante_pagamento->Estudante_id = $dados_academicos->id;
            $propina_id = Curso_classe::find($dados_academicos->curso_id)->propina_id;
            $estudante_pagamento->Propina_id = $propina_id;
            $estudante_pagamento->user_id = Auth::user()->id;
            $estudante_pagamento->Mes_id = $i;
            $estudante_pagamento->Data_pagamento = date('Y-m-d');
            $estudante_pagamento->save();
        }

        //aqui vai entrar inscrição de disciplinas do primeiro nivel para instituicoes do nivel medio ou secundário

        // $tipos_avaliacoes = Tipo_avaliacao::all();
        // $curso = Curso_classe::find($dados_academicos->curso_id);

        // foreach ($tipos_avaliacoes as $tipo_avaliacao){

        //     foreach($curso->niveis_academicos as $nivel){

        //         foreach($nivel->disciplinas as $disciplina){

        //             $notas = new Notas();
        //             $notas->curso_id = $curso->id;
        //             $notas->nivel_id = $nivel->id;
        //             $notas->turma_id = $dados_academicos->turma_id;
        //             $notas->disciplina_id = $disciplina->id;
        //             $notas->tipo_avaliacao_id = $tipo_avaliacao->id;
        //             $notas->estudante_id = $dados_academicos->id;
        //             $notas->save();
        //         }
        //     }

        // }


        return back()->with('estudante', $dados_academicos);



        $tipos_avaliacoes = Tipo_avaliacao::all();
        $curso = Curso_classe::find($dados_academicos->curso_id);

        foreach ($tipos_avaliacoes as $tipo_avaliacao) {

            foreach ($curso->niveis_academicos as $nivel) {

                foreach ($nivel->disciplinas as $disciplina) {

                    $notas = new Notas();
                    $notas->curso_id = $curso->id;
                    $notas->nivel_id = $nivel->id;
                    $notas->turma_id = $dados_academicos->turma_id;
                    $notas->disciplina_id = $disciplina->id;
                    $notas->tipo_avaliacao_id = $tipo_avaliacao->id;
                    $notas->estudante_id = $dados_academicos->id;
                    $notas->save();
                }
            }
        }
        return back();
    }

    public function actualizar_estudante($id)
    {
        $estudante = User::findOrFail($id);
        $estudante->apelido = Request::input('apelido');
        $estudante->name = Request::input('name');
        $estudante->genero_id = Request::input('genero_id');
        $estudante->data_nasc = Request::input('data_nascimento');
        $estudante->contacto = Request::input('contacto');
        $estudante->email = Request::input('email');
        $estudante->user_access_id = 1;


        $estudante->save();

        $dados_academicos = Dados_academicos::find($estudante->dados_academicos_estudante->id);
        $dados_academicos->curso_id = Request::input('curso_id');
        $dados_academicos->turma_id = Request::input('turma_id');
        $dados_academicos->estudante_id = $estudante->id;
        $dados_academicos->save();

        return back()->with('actualizar', $id);;
    }

    public function apagar_estudante($id)
    {

        $estudante = User::findOrFail($id);

        $estudante->delete();

        return back()->with('Apagar', $id);;
    }
}
