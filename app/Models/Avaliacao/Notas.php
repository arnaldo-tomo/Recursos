<?php

namespace App\Models\Avaliacao;

use App\Models\User;
use App\Models\Escola\Turma;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use App\Models\Escola\Nivel_academico;
use App\Models\Estudante\Dados_academicos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notas extends Model
{
    use HasFactory;

    protected $table = 'avaliacao__notas';
    public $timestamps = false;
    protected $fillable = array('curso_id','nivel_id','turma_id','disciplina_id','tipo_avaliacao_id','nota','nota_maxima','observacao','estudante_id','media_final_id');


    public function media_final(){
        return $this->belongsTo(Notas_exame::class,'media_final_id');
    }

    public function curso(){

        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }

    public function turma(){

        return $this->belongsTo(Turma::class,'turma_id');
    }

    public function disciplina(){

        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }
    
    public function tipo_avaliacao(){

        return $this->belongsTo(Tipo_avaliacao::class,'tipo_avaliacao_id');
    }
    
    public function estudante(){

        return $this->belongsTo(Dados_academicos::class,'estudante_id');
    }


    
}
