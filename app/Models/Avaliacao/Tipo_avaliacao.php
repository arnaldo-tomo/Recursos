<?php

namespace App\Models\Avaliacao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao__tipo_avaliacao';
    public $timestamps = false;
    protected $fillable = array('nome', 'peso_avaliacao');


    public function notas_avaliacoes(){
        return $this->hasMany(Notas::class,'tipo_avaliacao_id');
    }

    
}
