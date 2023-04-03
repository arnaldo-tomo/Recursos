<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    
    protected $table = 'mensagem';
    public $timestamps = true;
    protected $fillable = array('remetente','destinatario','assunto','mensagem');
}
