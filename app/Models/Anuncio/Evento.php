<?php

namespace App\Models\Anuncio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'anuncio__evento';
    public $timestamps = false;
    protected $fillable = array('tipo_evento_id','destinatario_id','assunto','descricao','data','foto','inicio','fim');


    function tipo_evento(){
        return $this->belongsTo(Tipo_evento::class,'tipo_evento_id');
    }
    
    public function destinatario(){
        return $this->belongsTo(Destinatario::class,'destinatario_id');
    }
}
