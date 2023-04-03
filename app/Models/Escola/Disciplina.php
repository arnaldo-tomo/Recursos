<?php

namespace App\Models\Escola;

use App\Models\Docente\Dados_academicos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'escola__disciplina';
    public $timestamps = false;
    protected $fillable = array('nome','codigo','descricao');



   /**
         * The docentes that belong to the Disciplina
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function docentes()
        {
            return $this->belongsToMany(Dados_academicos::class, 'escola__disciplina_docentes', 'disciplina_id', 'docente_id');
        }
    

        /**
         * The cursos that belong to the Disciplina
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function cursos()
        {
            return $this->belongsToMany(Curso_classe::class, 'escola__curso_disciplina', 'curso_id', 'disciplina_id');
        }
}
