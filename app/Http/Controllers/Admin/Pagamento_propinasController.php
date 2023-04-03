<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Request;
use App\Models\Ano;
use App\Models\Mes;
use App\Models\Escola\Turma;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Propinas\Propinas;
use App\Models\Escola\Curso_classe;
use App\Models\Propinas\Tpagamento;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudante\Dados_academicos;
use App\Models\Propinas\Pagamento_propinas;

class Pagamento_propinasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pagamento()
    {
        $pagamentos = Pagamento_propinas::all();
        $anos = Ano::all();
        $cursos = Curso_classe::all();
        $propinas = Propinas::all();
        $turmas= Turma::all();

        return view('admin.propinas.pagar_propina', compact('anos', 'propinas', 'cursos', 'pagamentos','turmas'));
    }

    public function estudantes()
    {
        $turma_id = Request::get('turma_id');
        $estudantes = Dados_academicos::where('turma_id', $turma_id)->get();

        $usuarios = array();

        for ($i = 0; $i < sizeof($estudantes); $i++) {

            // $usuarios[$i] = User::find($estudantes[$i]->estudante_id);
            $usuarios[$i] = $estudantes[$i]->estudante;
        }

        return response()->json($usuarios);
    }

    public function pesquisar_pagamento_estudante()
    {

        $curso = Curso_classe::find(Request::input('curso_id'));
        $turma = Turma::find(Request::input('turma_id'));
        $estudante = Dados_academicos::where('turma_id', Request::input('turma_id'))->first();
        $pagamentos=Pagamento_propinas::all();
        $tpagamento = Tpagamento::all();
        $meses = Mes::all();


        // $curso = Curso_classe::find(Request::input('curso_id'));
        // $turma = Turma::find(Request::input('turma_id'));
        // $estudante = Dados_academicos::where('estudante_id', Request::input('estudante_id'))->first();
        // $pagamentos = Pagamento_propinas::where('Estudante_id', $estudante->id)->get();
        // $tpagamento = Tpagamento::all();
        // $meses = Mes::all();

        return back()->with('meses',$meses)->with('curso', $curso)->with('turma',$turma)->with('estudante', $estudante)->with('pagamentos', $pagamentos)->with('tpagamento', $tpagamento);
    }

    public function ver_pagamento()
    {
        $meses = Mes::all();
        $propinas = Propinas::all();
        $pagamentos = Pagamento_propinas::all();
        $tpagamento = Tpagamento::all();
        $estudantes = Dados_academicos::all();
        return view('admin.propinas.ver_propinas', compact('meses', 'propinas', 'pagamentos', 'estudantes'));
    }


    public function pesquisar_pagamento()
    {
        $curso = Curso_classe::find(Request::input('curso_id'));
        $turma = Turma::find(Request::input('turma_id'));
        $meses = Mes::all();
        $propinas = Propinas::all();
        $pagamentos = Pagamento_propinas::all();
        return view('admin.propinas.ver_propinas', compact('meses', 'propinas', 'pagamentos', 'curso', 'turma'));
    }

    public function ver_pagamento_estudante()
    {
        $meses = Mes::all();
        $propinas = Propinas::all();
        $pagamentos = Pagamento_propinas::all();
        return view('admin.propinas.ver_propinas', compact('meses', 'propinas', 'pagamentos'));
    }

    public function apagar_pagamento($id)
    {

        $pagamento = Pagamento_propinas::findOrFail($id);

        $pagamento->delete();

        return back()->with('Apagar', $id);
    }

    public function actualizar_pagamento($id)
    {
        $estudante_pagamento = Pagamento_propinas::findOrFail($id);
        $estudante_pagamento->user_id = Auth::user()->id;
        $estudante_pagamento->Mes_id = Request::input('mes_id');
        $estudante_pagamento->Estado = 1;
        $estudante_pagamento->tpagamento_id = Request::input('tpagamento_id');
        $estudante_pagamento->Data_pagamento = Request::input('data_pagamento');
        $estudante_pagamento->save();

        $mes = Mes::all()->where('id', Request::input('mes_id'));
        $pagamento = Tpagamento::all()->where('id', Request::input('tpagamento_id'));


        // dd($estudante_pagamento->estudante->curso->nome);
        // dd($estudante_pagamento->estudante->estudante->name);
        // $info = Dados_academicos::get('estudante_id', $estudante_pagamento->Estundante_id);

        // $pdf = PDF::loadView('admin.propinas.comprovativo', compact('estudante_pagamento', 'pagamento', 'mes'));
        // return $pdf->setPaper('a4')->stream('fatura.pdf');
        return view('admin.propinas.comprovativo', compact('estudante_pagamento', 'pagamento', 'mes'));

        // return back()->with('actualizar', $id);
    }

    public function factura()
    {
        return view('admin.propinas.comprovativo');
    }

    public function downloadpdf($id)
    {
        $estudante_pagamento = Pagamento_propinas::findOrFail($id);
        $estudante_pagamento->user_id = Auth::user()->id;
        $estudante_pagamento->Mes_id = Request::input('mes_id');
        $estudante_pagamento->Estado = 1;
        $estudante_pagamento->tpagamento_id = Request::input('tpagamento_id');
        $estudante_pagamento->Data_pagamento = Request::input('data_pagamento');
        $estudante_pagamento->save();
        $mes = Mes::all()->where('id', Request::input('mes_id'));
        $pagamento = Tpagamento::all()->where('id', Request::input('tpagamento_id'));
        $pdf = PDF::loadView('admin.propinas.comprovativo', compact('estudante_pagamento', 'pagamento', 'mes'));
        return $pdf->download($estudante_pagamento->estudante->estudante->name . '.pdf');
    }
}
