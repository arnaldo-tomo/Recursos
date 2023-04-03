<?php

namespace App\Models\Estudante;

use App\Models\Ano;
use App\Models\User;
use App\Models\Escola\Turma;
use App\Models\Avaliacao\Notas;
use App\Models\Escola\Matricula;
use App\Models\Calendario\Regime;
use App\Models\Escola\Curso_classe;
use App\Models\Avaliacao\Notas_exame;
use App\Models\Escola\Nivel_academico;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propinas\Pagamento_propinas;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dados_academicos extends Model
{
    use HasFactory;


    protected $table = 'estudante__dados_academicos';
    public $timestamps = false;
    protected $fillable = array('codigo','curso_id','turma_id','estudante_id','ano_lectivo_id','nivel_id','ano_ingresso','regime_id');



    public function regime(){

        return $this->belongsTo(Regime::class,'regime_id');
    }

    public function nivel(){

        return $this->belongsTo(Nivel_academico::class,'nivel_id');
    }
  


    public function curso()
    {

        return $this->belongsTo(Curso_classe::class, 'curso_id');
    }

    public function ano_lectivo()
    {
        return $this->belongsTo(Ano::class, 'ano_lectivo_id');
    }

    public function turma()
    {

        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function estudante()
    {

        return $this->belongsTo(User::class, 'estudante_id');
    }

    public function notas()
    {

        return $this->hasMany(Notas::class, 'estudante_id', 'name', 'apelido');
    }

    public function exames()
    {

        return $this->hasMany(Notas_exame::class, 'estudante_id');
    }

    public function pagamentos()
    {

        return $this->hasMany(Pagamento_propinas::class, 'Estudante_id');
    }

    public function inscricoes(){

        return $this->hasMany(Inscricao::class,'estudante_id');
    }

    public function matriculas(){

        return $this->hasMany(Matricula::class,'estudante_id');
    }


}
