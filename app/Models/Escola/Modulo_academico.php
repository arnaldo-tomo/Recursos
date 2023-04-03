<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo_academico extends Model
{
    use HasFactory;
    protected $table = 'escola__modulo';
    public $timestamps = false;
    protected $fillable = array('nome', 'descricao');
}
