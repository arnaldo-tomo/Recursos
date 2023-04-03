<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Escola\Turma;
use App\Models\Calendario\Dias;
use App\Models\Calendario\Tempo;
use App\Models\Calendario\Turno;
use App\Models\Calendario\Regime;
use App\Models\Calendario\Periodo;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use App\Models\Docente\Dados_academicos;
use App\Models\Calendario\Horario_academico;

class HorariosController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function tempos()
    {

        session(['key' => '55']);
        $tempos = Tempo::all();
        $periodos = Periodo::all();
        return view('admin.horarios.tempos', compact('tempos', 'periodos'));
    }
    public function turno()
    {

        $turnos = Turno::all();
        $periodos = Periodo::all();
        return view('admin.horarios.turnos', compact('turnos', 'periodos'));
    }

    public function salvar_turno()
    {

        $turno = new Turno();
        $turno->periodo_id = Request::input('periodo_id');
        $turno->descricao = Request::input('descricao');
        $turno->save();

        return back()->with('turno', 'salvo com sucesso');
    }


    public function salvar_tempo()
    {

        $tempo = new Tempo();
        $tempo->tempo = Request::input('tempo');
        $tempo->inicio = Request::input('inicio');
        $tempo->fim = Request::input('fim');
        $tempo->turno_id = Request::input('turno_id');

        $tempo->save();

        return back()->with('tempo', $tempo);
    }

    public function frm_horario()
    {

        $horarios = Horario_academico::all();
        $dias = Dias::all();
        $cursos = Curso_classe::all();
        $docentes = Dados_academicos::all();
        $tempos = Tempo::all();
        $regimes = Regime::all();
        $periodos = Periodo::all();
        $turnos = Turno::all();

        return view('admin.horarios.horarios', compact('horarios', 'dias', 'cursos', 'docentes', 'tempos', 'regimes', 'periodos', 'turnos'));
    }

    public function ver_horario()
    {


        $dias = Dias::all();
        $cursos = Curso_classe::all();

        return view('admin.horarios.ver_horarios', compact('dias', 'cursos'));
    }


    public function pesquisar_horario()
    {
        $turma = Turma::find(Request::input('turma_id'));
        $dias = Dias::all();
        return back()->with('resultado_pesquisa', $turma);
    }

    public function salvar_horario()
    {
        Request::validate([
            'dia_id' => 'required',
            'tempo_id' => 'required',
            'periodo_id' => 'required',
            'curso_id' => 'required',
            'turma_id' => 'required',
            'disciplina_id' => 'required',
            'docente_id' => 'required',
            'sala' => 'required',
            'ano' => 'required',
        ]);

        $horario_docente = Horario_academico::where('dia_id', Request::input('dia_id'))->where('tempo_id', Request::input('tempo_id'))->where('docente_id', Request::input('docente_id'))->first();
        $horario_turma = Horario_academico::where('dia_id', Request::input('dia_id'))->where('tempo_id', Request::input('tempo_id'))->where('turma_id', Request::input('turma_id'))->first();


        if ($horario_docente != null) {

            return back()->with('mensagem_erro', 'Docente indisponivel nesse horário');
        } elseif ($horario_turma != null) {
            return back()->with('mensagem_erro', 'Turma indisponível nesse horário');
        } else {
            $novo_horario = new Horario_academico();
            $novo_horario->dia_id = Request::input('dia_id');
            $novo_horario->tempo_id = Request::input('tempo_id');
            $novo_horario->periodo_id = Request::input('periodo_id');
            $novo_horario->curso_id = Request::input('curso_id');
            $novo_horario->turma_id = Request::input('turma_id');
            $novo_horario->disciplina_id = Request::input('disciplina_id');
            $novo_horario->docente_id = Request::input('docente_id');
            $novo_horario->sala = Request::input('sala');
            $novo_horario->ano = Request::input('ano');
            $novo_horario->save();
            return back()->with('mensagem', 'Horário criado com sucesso');
        }
    }

    public function turmas()
    {
        $curso_id = Request::get('curso_id');
        $turmas = Turma::where('curso_id', $curso_id)->get();
        return response()->json($turmas);
    }


    public function mostrar_periodos()
    {
        $regime_id = Request::get('regime_id');
        $periodos = Periodo::where('regime_id', $regime_id)->get();
        return response()->json($periodos);
    }

    public function mostrar_turnos()
    {
        $periodo_id = Request::get('periodo_id');
        $turnos = Turno::where('periodo_id', $periodo_id)->get();
        return response()->json($turnos);
    }

    public function mostrar_tempos()
    {
        $turno_id = Request::get('turno_id');
        $tempos = Tempo::where('turno_id', $turno_id)->get();
        return response()->json($tempos);
    }

    public function disciplinas()
    {
        $curso_id = Request::get('curso_id');
        $disciplinas = Curso_classe::find($curso_id)->dis;
        return response()->json($disciplinas);
    }

    public function apagar_horario($id)
    {

        $horario =  Horario_academico::findOrFail($id);

        $horario->delete();

        return back()->with('Apagar', $id);
    }

    public function actualizar_horario($id)
    {

        $horario = Horario_academico::findOrFail($id);
        $horario->dia_id = Request::input('dia_id');
        $horario->hora_id = Request::input('tempo_id');
        $horario->periodo_id = Request::input('periodo_id');
        $horario->curso_id = Request::input('curso_id');
        $horario->turma_id = Request::input('turma_id');
        $horario->disciplina_id = Request::input('disciplina_id');
        $horario->docente_id = Request::input('docente_id');
        $horario->sala = Request::input('sala');
        $horario->ano = Request::input('ano');
        $horario->save();

        return back()->with('actualizar', $id);
    }
}
