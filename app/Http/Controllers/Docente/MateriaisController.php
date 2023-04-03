<?php

namespace App\Http\Controllers\Docente;

use Request;
use App\Models\Docente\Material;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MateriaisController extends Controller
{
    //

    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function novo_material(){

        $cursos = Curso_classe::all();
     
        return view('docente.materiais.novo_material', compact('cursos'));
    }

    public function todos_materiais(){

        $cursos = Curso_classe::all();
    
        return view('docente.materiais.materiais', compact('cursos'));
    }

    public function salvar_material(){


        $materiais = new Material();

        $materiais->curso_id = Request::input('curso_id');
        $materiais->turma_id = Request::input('turma_id');
        $materiais->disciplina_id = Request::input('disciplina_id');
        $materiais->nome = Request::input('nome');
        $materiais->docente_id = Auth::user()->docente->id;
    
        $materiais->data = now();
        $materiais->observacao = Request::input('observacao');

        if(Request::file('ficheiro') != null){
            $filename = Request::file('ficheiro')->getClientOriginalName();
            $link = "documentos/materiais/".$filename;
            $materiais->ficheiro = $link;
            $material = Request::file('ficheiro');
            $material->move('documentos/materiais',$filename);
            }

            $materiais->save();
            
            return back()->with('material','Material criado com sucesso');
    }


    public function pesquisar_materiais(){

        $disciplina = Disciplina::find(Request::input('disciplina_id'));
        $materiais = Material::where('curso_id',Request::input('curso_id'))->where('disciplina_id',Request::input('disciplina_id'))->where('turma_id',Request::input('turma_id'))->get();
       
        return back()->with('materiais',$materiais)->with('disciplina',$disciplina);
    }


    public function apagar_material($id){
        
        $material =  Material::findOrFail($id);
      
        $material->delete();
        
        return back()->with('Apagar',$id);

    }

    public function actualizar_material($id){


        $material = Material::findOrFail($id);

        $material->curso_id = Request::input('curso_id');
        $material->turma_id = Request::input('turma_id');
        $material->disciplina_id = Request::input('disciplina_id');
        $material->nome = Request::input('nome');
    
        $material->data = now();
        $material->observacao = Request::input('observacao');

        if(Request::file('ficheiro') != null){
            $filename = Request::file('ficheiro')->getClientOriginalName();
            $link = "documentos/materiais/".$filename;
            $material->ficheiro = $link;
            $material = Request::file('ficheiro');
            $material->move('documentos/materiais',$filename);
            }

            $material->save();
            
            return back()->with('actualizar',$id); 
    }

}
