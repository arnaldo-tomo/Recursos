<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Anuncio\Evento;
use App\Models\Anuncio\Tipo_evento;
use App\Http\Controllers\Controller;
use App\Models\Anuncio\Destinatario;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $anuncios = Evento::all();
        $tipos_eventos = Tipo_evento::all();
        $destinatarios = Destinatario::all();
      
        return view('Admin.Home',compact('anuncios','tipos_eventos','destinatarios'));
    }

  
}
