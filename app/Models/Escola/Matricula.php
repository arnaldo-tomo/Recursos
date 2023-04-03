<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estudante\Dados_academicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'estudante__nivel_matricula';
    public $timestamps = false;
    protected $fillable = array('estudante_id','nivel_id','cod_maricula','ano_letivo_id', 'curso_id','talao');


    public function estudante(){
        return $this->belongsTo(Dados_academicos::class, 'estudante_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class, 'nivel_id');
    }

    public function ano_letivo(){
        return $this->belongsTo(Ano::class, 'ano_letivo_id');
    }

    public function curso(){
        return $this->belongsTo(Curso_classe::class, 'curso_id');
    }
}
