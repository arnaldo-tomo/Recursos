<?php

namespace App\Models\Estudante;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dados_filiacao extends Model
{
    use HasFactory;

    
    protected $table = 'estudante__dados_filiacao';
    public $timestamps = false;
    protected $fillable = array('nome_pai','nome_mae','profissao_pai','profissao_mae','morada_pai','morada_mae','local_trabalho_pai','local_trabalho_mae    ','estudante_id');


    public function estudante(){

        return $this->belongsTo(User::class,'estudante_id');
    }
}
