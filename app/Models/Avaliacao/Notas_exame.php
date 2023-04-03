<?php

namespace App\Models\Avaliacao;

use App\Models\Avaliacao\Notas;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use App\Models\Escola\Nivel_academico;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudante\Dados_academicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notas_exame extends Model
{
    use HasFactory;

    protected $table = 'avaliacao__notas_exames';
    public $timestamps = false;
    protected $fillable = array('disciplina_id','curso_id','periodo_id','nivel_id','nota_frequencia','observacao','nota_exame_normal','nota_exame_recorrencia','media_final','estado','estudante_id');


    public function estudante(){

        return $this->belongsTo(Dados_academicos::class,'estudante_id');
    }

    public function curso(){

        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }

    public function periodo(){

        return $this->belongsTo(Periodo::class,'periodo_id');
    }

    public function disciplina(){

        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }

    public function notas(){

        return $this->hasMany(Notas::class,'media_final_id');
    }

}
