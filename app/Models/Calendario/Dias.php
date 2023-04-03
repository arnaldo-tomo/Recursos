<?php

namespace App\Models\Calendario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    use HasFactory;

    protected $table = 'calendario__dias';
    public $timestamps = false;
    protected $fillable = array('dia');

    public function horarios(){ 

        return $this->hasMany(Horario_academico::class,'dia_id');
    }
}
