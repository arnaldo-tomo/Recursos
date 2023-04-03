<?php

namespace App\Models\Estudante;

use App\Models\Ano;
use App\Models\Escola\Nivel_academico;
use Illuminate\Database\Eloquent\Model;
use App\Models\Escola\Periodo_academico;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscricao extends Model
{
    use HasFactory;
    protected $table = 'estudante__inscricoes';
    public $timestamps = false;
    protected $fillable = array('ano_letivo_id','nivel_id','periodo_id','estudante_id','data');




    public function ano_lectivo(){

        return $this->belongsTo(Ano::class,'ano_letivo_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }

    public function periodo(){

        return $this->belongsTo(Periodo_academico::class,'periodo_id');
    }

    public function estudante(){

        return $this->belongsTo(Dados_academicos::class,'estudante_id');
    }

}
