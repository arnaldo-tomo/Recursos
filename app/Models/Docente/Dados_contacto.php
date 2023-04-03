<?php

namespace App\Models\Docente;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dados_contacto extends Model
{
    use HasFactory;

    protected $table = 'docente__dados_contacto';
    public $timestamps = false;
    protected $fillable = array('morada','morada2','nacionalidade','localidade','provincia','email','professor_id');


    public function professor(){

        return $this->belongsTo(User::class, 'professor_id');
    }
}
