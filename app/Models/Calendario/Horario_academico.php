<?php

namespace App\Models\Calendario;

use App\Models\Escola\Turma;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente\Dados_academicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario_academico extends Model
{
    use HasFactory;

    protected $table = 'calendario__horario_academico';
    public $timestamps = false;
    protected $fillable = array('dia_id','tempo_id','curso_id','nivel_id','periodicidade_id','turma_id','disciplina_id','docente_id','periodo_id');


    public function docente() {

        return $this->belongsTo(Dados_academicos::class,'docente_id');
    }


    public function dia(){

        return $this->belongsTo(Dias::class, 'dia_id');
    }

    public function curso(){

        return $this->belongsTo(Curso_classe::class, 'curso_id');
    }

    public function disciplina(){

        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }

    public function turma(){

        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function periodo(){

        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public function tempo(){
        return $this->belongsTo(Tempo::class, 'tempo_id');
    }


}
