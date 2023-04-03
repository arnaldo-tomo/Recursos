<?php

namespace App\Models\Anuncio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_evento extends Model
{
    use HasFactory;

    protected $table = 'anuncio__tipo_evento';
    public $timestamps = false;
    protected $fillable = array('nome');
}
