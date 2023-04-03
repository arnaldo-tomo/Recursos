<?php

namespace App\Models\Docente;

use App\Models\User;
use App\Models\Universidade;
use App\Models\Avaliacao\Notas;
use App\Models\Escola\Disciplina;
use Illuminate\Database\Eloquent\Model;
use App\Models\Calendario\Horario_academico;
use App\Models\Escola\Curso_classe;
use App\Models\Escola\Curso_disciplina;
use App\Models\Escola\Nivel_academico;
use App\Models\Escola\Periodo_academico;
use App\Models\Escola\Turma;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dados_academicos extends Model
{
    use HasFactory;

    protected $table = 'docente__dados_academicos';
    public $timestamps = false;
    protected $fillable = array('codigo', 'area_formacao', 'nivel_academico_id', 'universidade_id', 'ano_conclusao', 'media', 'professor_id');


    public function nivel_academico()
    {

        return $this->belongsTo(Dados_nivel_academico::class, 'nivel_academico_id');
    }

    public function universidade()
    {

        return $this->belongsTo(Universidade::class, 'universidade_id');
    }

    public function docente()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario_academico::class, 'docente_id');
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'escola__disciplina_docentes', 'docente_id', 'disciplina_id');
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'escola__disciplina_docentes', 'docente_id', 'turma_id');
    }
    public function Periodos()
    {
        return $this->belongsToMany(Periodo_academico::class, 'escola__disciplina_docentes', 'docente_id', 'periodo_id');
    }
    public function Nivels()
    {
        return $this->belongsToMany(Nivel_academico::class, 'escola__disciplina_docentes', 'docente_id', 'nivel_id');
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso_disciplina::class, 'escola__curso_disciplinas', 'docente_id', 'curso_id');
    }
}
