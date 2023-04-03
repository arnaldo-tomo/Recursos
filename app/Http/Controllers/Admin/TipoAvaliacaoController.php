<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avaliacao\Tipo_avaliacao;
use Request;

class TipoAvaliacaoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestao_tipo_avaliacao(){

        return view('admin.avaliacao.criar_tipo_avaliacao');
    }


    public function criar_tipo_avaliacao(){

        $t_avaliacao = new Tipo_avaliacao();
        $t_avaliacao->nome = Request::input('name');
        $t_avaliacao->peso_avaliacao = Request::input('peso');
        $t_avaliacao->save();

        return back()->with('avaliacao',Request::input('name'));

    }

    public function ver_tipo_avaliacao(){
        $tipos_avaliacao = Tipo_avaliacao::all();

        return view('admin.avaliacao.ver_tipo_avaliacao', compact('tipos_avaliacao'));
    }

    public function actualizar_tipo_avaliacao($id){

        $t_avaliacao = Tipo_avaliacao::findOrFail($id);
        $t_avaliacao->nome = Request::input('name');
        $t_avaliacao->peso_avaliacao = Request::input('peso');
        $t_avaliacao->save();

        return back()->with('actualizar',$id);

    }

    public function apagar_tipo_avaliacao($id){

        $t_avaliacao = Tipo_avaliacao::findOrFail($id);

        $t_avaliacao->delete();
        
        return back()->with('Apagar',$id);

    }

}
