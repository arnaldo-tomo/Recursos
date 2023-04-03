<?php

namespace App\Models;

use App\Models\Escola\Curso_classe;
use App\Models\Estudante\Dados_academicos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ano extends Model
{
    use HasFactory;

    
    protected $table = 'Ano_lectivo';
    public $timestamps = false;
    protected $fillable = array('Ano','descricao','inicio_aulas','termino_aulas','estado');

    public function Ano(){

        return $this->hasMany(Curso_classe::class, 'Ano_id');
    }

    public function estudantes(){
        return $this->hasMany(Dados_academicos::class,'ano_lectivo_id');
    }

    public function cursos(){
        return $this->hasMany(Curso_classe::class,'ano_id');
    }


}
