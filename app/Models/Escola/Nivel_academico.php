<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_academico extends Model
{
    use HasFactory;

    protected $table = 'escola__nivel_academico';
    public $timestamps = false;
    protected $fillable = array('nivel','descricao');

    public function curso(){

        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso_classe::class, 'escola__academico_curso', 'nivel_id', 'curso_id');
    }

}
