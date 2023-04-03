<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_nivel extends Model
{
    use HasFactory;

    protected $table = 'escola__curso_nivel';
    public $timestamps = false;
    protected $fillable = array('nivel_id','descricao','curso_id');



    public function curso(){

        return $this->belongsTo(Curso_classe::class,'curso_id');
    }

        
}
