<?php

namespace App\Models\Estudante;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarregado extends Model
{
    use HasFactory;

    
    protected $table = 'estudante__dados_encarregado';
    public $timestamps = false;
    protected $fillable = array('nome','email','profissao','morada','local_trabalho','contacto','contacto_alternativo','estudante_id');

    public function estudante(){

        return $this->belongsTo(User::class, 'estudante_id');
    }
}
