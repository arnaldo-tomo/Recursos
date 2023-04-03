<?php

namespace App\Models\Calendario;

use App\Models\Avaliacao\Tipo_avaliacao;
use App\Models\Escola\Disciplina;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $table = 'calendario_exames';
    public $timestamps = false;
    protected $fillable = array('data','hora','disciplina_id','sala','assento','tipo_avaliacao_id');



    public function tipo_avaliacao(){

        return $this->belongsTo(Tipo_avaliacao::class,'tipo_avaliacao_id');
    }

    public function disciplina(){

        return $this->belongsTo(Disciplina::class,'disciplina_id');
    }

}
