<?php

namespace App\Models\Escola;

use App\Models\Avaliacao\Avaliacao;
use App\Models\Avaliacao\Notas;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudante\Dados_academicos;
use App\Models\Calendario\Horario_academico;
use App\Models\Calendario\Turno;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'escola__turmas';
    public $timestamps = false;
    protected $fillable = array('turma','curso_id','codigo','descricao','nr_estudanes','lotacao_max');

    public function curso(){

        return $this->belongsTo(Curso_classe::class, 'curso_id');
    }

    public function avaliacoes(){
        return $this->hasMany(Avaliacao::class, 'turma_id');
    }

    public function estudantes(){

        return $this->hasMany(Dados_academicos::class, 'turma_id');
    }

    public function horarios(){

        return $this->hasMany(Horario_academico::class,'turma_id');
    }

    public function notas(){

        return $this->hasMany(Notas::class,'turma_id');
    }

    public function turnos (){
        return $this->belongsToMany(Turno::class, 'turma_turnos','turma_id','turno_id');
    }
}
