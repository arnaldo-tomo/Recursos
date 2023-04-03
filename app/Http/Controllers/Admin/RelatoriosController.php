<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function relatorios()
    {      
        return view('Admin.relatorios');
    }
}
