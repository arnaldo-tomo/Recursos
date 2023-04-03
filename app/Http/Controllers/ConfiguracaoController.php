<?php

namespace App\Http\Controllers;

use App\Models\Escola\Modulo_academico;
use App\Models\Escola\Periodo_academico;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function configuracao()
    {
        $Periodo_academico = Periodo_academico::all();
        $Periodo_modulo = Modulo_academico::all();
        return view('admin.configuracao', compact('Periodo_academico', 'Periodo_modulo'));
    }

    public function Salvar_Periodo_academico(Request $request)
    {
        $Periodo_academico = new Periodo_academico();
        $Periodo_academico->nome = $request->input('nome');
        $Periodo_academico->descricao = $request->input('descricao');
        $Periodo_academico->save();
        $erro = "Perido Registado com sucessos";
        return back()->with('periodo', $erro);
    }
    public function Update_Periodo_academico(Request $request, $id)
    {
        $Periodo_academico = Periodo_academico::find($id);
        $Periodo_academico->update($request->all());
        $Periodo_academico->save();
        $erro = "Perido Actualizado com Sucesso.";
        return back()->with('periodo', $erro);
    }

    public function Delete_Periodo_academico($id)
    {
        $Periodo_modulo =  Periodo_academico::findOrFail($id);
        $Periodo_modulo->delete();
        $erro = "Periodo Deletado com sucessos";
        return back()->with('periodo', $erro);
    }

    // sessao mudulos
    public function Salvar_modulo_academico(Request $request)
    {
        $Periodo_modulo = new Modulo_academico();
        $Periodo_modulo->nome = $request->input('nome');
        $Periodo_modulo->descricao = $request->input('descricao');
        $Periodo_modulo->save();
        $erro = "Modulo Registado com sucessos";
        return back()->with('modulo', $erro);
    }

    public function Delete_modulo_academico($id)
    {
        $Periodo_academico =  Modulo_academico::findOrFail($id);
        $Periodo_academico->delete();
        $erro = "Modulo Deletado com sucessos";
        return back()->with('modulo', $erro);
    }

    public function Update_modulo_academico(Request $request, $id)
    {
        $Periodo_modulo = Modulo_academico::find($id);
        $Periodo_modulo->update($request->all());
        $Periodo_modulo->save();
        $erro = "Modulo Actulizado com sucessos";
        return back()->with('modulo', $erro);
    }
}
