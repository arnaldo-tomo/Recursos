<?php

namespace App\Models\Calendario;

use App\Models\Escola\Turma;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Turno extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'calendario__turnos';
    public $timestamps = false;
    protected $fillable = array('periodo_id','descricao');

    public function periodo() {

        return $this->belongsTo(Periodo::class,'periodo_id');
    }

    public function tempos(){

        return $this->hasMany(Tempo::class,'turno_id');
    }

    public function turmas (){
        return $this->belongsToMany(Turma::class, 'turma_turnos','turma_id','turno_id');
    }
}
