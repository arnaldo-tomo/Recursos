<?php

namespace App\Models\Anuncio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
    use HasFactory;

    protected $table = 'anuncio__destinatario';
    public $timestamps = false;
    protected $fillable = array('nome');

    
}
