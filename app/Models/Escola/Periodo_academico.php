<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo_academico extends Model
{
    use HasFactory;

    protected $table = 'escola__periodo';
    public $timestamps = false;
    protected $fillable = array('nivel_id', 'nome', 'descricao');



    public function nivel()
    {

        return $this->belongsTo(Nivel_academico::class, 'nivel_id');
    }
}
