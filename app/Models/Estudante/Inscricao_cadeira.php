<?php

namespace App\Models\Estudante;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao_cadeira extends Model
{
    use HasFactory;

    protected $table = 'estudante__inscricao_cadeiras';
    public $timestamps = false;
    protected $fillable = array('inscricao_id','media_final_id','nota_frequencia','nota_final_id','observacao');

}
