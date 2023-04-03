<?php

namespace App\Models\Avaliacao;

use App\Models\Escola\Turma;
use Facade\FlareClient\View;
use App\Models\Escola\Disciplina;
use App\Models\Escola\Curso_classe;
use Illuminate\Database\Eloquent\Model;
use App\Models\Avaliacao\Tipo_avaliacao;
use App\Models\Escola\Nivel_academico;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao__avaliacoes';
    public $timestamps = false;
    protected $fillable = array('curso_id','nivel_id','turma_id','disciplina_id','docente_id','data','tipo_avaliacao_id','observacao','ficheiro','publicar','data_entrega','estado');

    public function curso()
    {
        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class,'turma_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }

    public function tipo_avaliacao(){

        return $this->belongsTo(Tipo_avaliacao::class,'tipo_avaliacao_id');
    }
}
