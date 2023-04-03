<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina_docente extends Model
{
    use HasFactory;
    
    protected $table = 'escola__academico_curso';
    public $timestamps = false;
    protected $fillable = array('nivel_id','curso_id');

}