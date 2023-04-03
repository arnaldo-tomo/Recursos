<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina_docente extends Model
{
    use HasFactory;

    protected $table = 'escola__disciplina_docentes';
    public $timestamps = false;
    protected $fillable = array('disciplina_id', 'docente_id', 'turma_id', 'ano_id', 'nivel_id', 'periodo_id');
}
