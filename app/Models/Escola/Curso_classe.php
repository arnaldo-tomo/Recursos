<?php

namespace App\Models\Escola;

use App\Models\Ano;
use App\Models\Propinas\Propinas;
use App\Models\Docente\Material;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudante\Dados_academicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Docente\Dados_academicos as DocenteDados_academicos;

class Curso_classe extends Model
{
    use HasFactory;

    protected $table = 'escola__curso_classe';
    public $timestamps = false;
    protected $fillable = array('nome','codigo','descricao','docente_id', 'ano_id', 'propina_id','estudante_max_turma');


    public function estudantes(){

        return $this->hasMany(Dados_academicos::class, 'curso_id');
    }

    public function turmas(){

        return $this->hasMany(Turma::class, 'curso_id');
    }

    public function docentes(){

        return $this->hasMany(DocenteDados_academicos::class, 'curso_id');
    }

    public function Ano(){

        return $this->belongsTo(Ano::class, 'Ano_id');
    }

   
    public function docente(){
        return $this->belongsTo(DocenteDados_academicos::class,'docente_id');
    }

    public function propina(){
        return $this->belongsTo(Propinas::class,'id');
    }

    public function materiais(){
        return $this->hasMany(Material::class, 'curso_id');
    }

    /**
     * The disciplinas that belong to the Curso_classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dis()
    {
        return $this->belongsToMany(Disciplina::class, 'escola__curso_disciplinas', 'curso_id','disciplina_id');
    }

    public function disciplinas(){
        return $this->hasMany(Curso_disciplina::class, 'curso_id');  }
    //Inicio da chave estrangeira
    public function niveis()
    {
        return $this->belongsToMany(Nivel_academico::class, 'escola__academico_curso', 'nivel_id', 'curso_id');
    }

}
