<?php

namespace App\Models\Propinas;

use App\Models\Escola\Curso_classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Propinas extends Model{
    use HasFactory;

    protected $table = 'Propinas';
    public $timestamps = false;
    protected $fillable = array('Valor','Data_inicio','Descricao','dias');


    public function cursos(){

        return $this->hasMany(Curso_classe::class, 'Propinas_id');
    }

}
