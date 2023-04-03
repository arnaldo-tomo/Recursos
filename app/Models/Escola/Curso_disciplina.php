<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_disciplina extends Model
{
    use HasFactory;

    
    protected $table = 'escola__curso_disciplinas';
    public $timestamps = false;
    protected $fillable = array('curso_id','nivel_id','periodo_id','discilina_id');


    public function nivel() {
        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }
    public function curso() {
        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

    public function periodo() {
        return $this->belongsTo(Periodo_academico::class,'nivel_id');
    }

    public function disciplina() {
        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }


}
