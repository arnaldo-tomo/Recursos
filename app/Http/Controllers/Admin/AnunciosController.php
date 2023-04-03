<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anuncio\Destinatario;
use App\Models\Anuncio\Evento;
use App\Models\Anuncio\Tipo_evento;
use Request;

class AnunciosController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestao_anuncios()
    {

        $anuncios = Evento::all();
        $tipos_eventos = Tipo_evento::all();
        $destinatarios = Destinatario::all();

        return view('admin.anuncios', compact('anuncios', 'tipos_eventos', 'destinatarios'));
    }

    public function salvar_anuncio()
    {
        Request::validated([
            'tipo_evento_id' => 'required',
            'destinatario_id' => 'required',
            'assunto' => 'required',
            'inicio' => 'required',
            'imagem' => 'required',
            'imagem' => 'required',
        ]);
        $anuncio = new Evento();
        $anuncio->tipo_evento_id = Request::input('tipo_evento_id');
        $anuncio->destinatario_id = Request::input('destinatario_id');
        $anuncio->assunto = Request::input('assunto');
        $anuncio->descricao = Request::input('descricao');
        $anuncio->data = now();
        $anuncio->inicio = Request::input('inicio');
        $anuncio->fim = Request::input('imagem');

        if (Request::file('imagem') != null) {
            $filename = Request::file('imagem')->getClientOriginalName();
            $link = "fotos/anuncios/" . $filename;
            $anuncio->foto = $link;
            $foto = Request::file('imagem');
            $foto->move('fotos/anuncios', $filename);
        }

        return back()->with('anuncio', Request::input('tipo_evento_id'));

        return back()->with('anuncio', Request::input('tipo_evento_id'));
    }

    public function actualizar_anuncio($id)
    {

        $anuncio = Evento::findOrFail($id);
        $anuncio->tipo_evento_id = Request::input('tipo_evento_id');
        $anuncio->destinatario_id = Request::input('destinatario_id');
        $anuncio->assunto = Request::input('assunto');
        $anuncio->descricao = Request::input('descricao');
        $anuncio->data = Request::input('dataexp');

        $anuncio->save();

        return back()->with('actualizar', Request::input('tipo_evento_id'));
    }

    public function apagar_anuncio($id)
    {

        $anuncio =  Evento::findOrFail($id);

        $anuncio->delete();

        return back()->with('Apagar', $id);
    }
}
