<?php

namespace App\Models\Docente;

use App\Models\Escola\Turma;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material__materiais';
    public $timestamps = false;
    protected $fillable = array('nome','curso_id','turma_id','disciplina_id','docente_id','observacao','ficheiro','data');

    public function curso(){
        return $this->belongsTo(Curso_classe::class, 'curso_id');
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }

    public function turma(){

        return $this->belongsTo(Turma::class,'turma_id');
    }

    public function docente(){

        return $this->belongsTo(Dados_academicos::class,'docente_id');
    }


}
