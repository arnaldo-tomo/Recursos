<?php

namespace App\Http\Controllers\Estudante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function juris(){

        return view('estudante.exames.juris');
    }

    public function calendario(){

        return view('estudante.exames.exames');
    }

}
