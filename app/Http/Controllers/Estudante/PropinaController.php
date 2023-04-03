<?php

namespace App\Http\Controllers\Estudante;

use App\Models\Ano;
use App\Models\Mes;
use Request;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudante\Dados_academicos;
use App\Models\Propinas\Pagamento_propinas;
use App\Models\Propinas\Tpagamento;
use Illuminate\Support\Facades\DB;

class PropinaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function propina()
    {
        $estudante = Dados_academicos::where('estudante_id', Auth::user()->id)->first();
        $propinas = Pagamento_propinas::where('Estudante_id', $estudante->id)->get();
        $anos = Ano::all();
        $tipo_pagamentos=Tpagamento::all();
        $cursos = Curso_classe::all();
        return view('estudante.propina', compact('anos','propinas', 'cursos','estudante','tipo_pagamentos'));
    }

    //Incio do metido para fazer a pesquisa de dados
    public function filtrar_pagamentos() 
    {
        //$anos = Ano::find(Request::input('Ano'))->get();
        $tipo_pagamentos = Tpagamento::find(Request::input('id'));
        $estudante= Dados_academicos::where('estudante_id', Auth::user()->id)->first();
        $propinas = Pagamento_propinas::orderby('id','ASC')->where('Estudante_id', Auth::user()->id)->get();
        $mes=Mes::all();

        return back()->with('propinas',$propinas)->with('estudante',$estudante)->with('tipo_pagamentos',$tipo_pagamentos);
    }
}