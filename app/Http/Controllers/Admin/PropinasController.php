<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Ano;
use App\Models\Mes;
use App\Models\Propinas\Propinas;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;

class PropinasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function propina()
    {
        $propinas = Propinas::all();
        $anos = Ano::all();
        $cursos = Curso_classe::all();
        return view('admin.propinas.criar_propinas', compact('anos', 'propinas', 'cursos'));
    }


    public function salvar_propina()
    {

        Request::validated([
            'valor' => 'required',
            'data' => 'required',
            'descricao' => 'required',
            'dias' => 'required',
        ]);
        $propina = new Propinas();
        $propina->Valor = Request::input('valor');
        $propina->Data_inicio = Request::input('data');
        $propina->Descricao = Request::input('descricao');
        $propina->dias = Request::input('dias');

        $propina->save();

        return back()->with('propina', Request::input('valor'));
    }

    public function ver_propinas()
    {
        $meses = Mes::all();
        $propinas = Propinas::all();
        return view('admin.propinas.criar_propinas', compact('meses', 'propinas'));
    }

    public function apagar_propina($id)
    {

        $propina = Propinas::findOrFail($id);

        $propina->delete();

        return back()->with('Apagar', $id);
    }

    public function actualizar_propina($id)
    {

        $propina = Propinas::findOrFail($id);
        $propina->Valor = Request::input('valor');
        $propina->Data_inicio = Request::input('data');
        $propina->Descricao = Request::input('descricao');
        $propina->dias = Request::input('dias');

        $propina->save();

        return back()->with('actualizar', $id);
    }
}
