<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MateriaisController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function todos_materiais(){

        $materiais = Auth::user()->dados_academicos_estudante->curso->materiais;
    
        return view('estudante.materiais', compact('materiais'));
    }
}
