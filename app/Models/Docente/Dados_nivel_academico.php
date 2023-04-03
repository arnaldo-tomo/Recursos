<?php

namespace App\Models\Docente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dados_nivel_academico extends Model
{
    use HasFactory;

    protected $table = 'docente__niivel_academico';
    public $timestamps = false;
    protected $fillable = array('nome');
}
