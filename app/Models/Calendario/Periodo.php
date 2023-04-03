<?php

namespace App\Models\Calendario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'calendario__periodo';
    public $timestamps = false;
    protected $fillable = array('nome','regime_id');



    public function horarios(){

        return $this->hasMany(Horario_academico::class,'periodo_id');
    }


    public function horas(){
        return $this->hasMany(Tempo::class,'periodo_id');
    }
    public function turnos(){
        return $this->hasMany(Turno::class,'periodo_id');
    }

    public function regime(){

        return $this->belongsTo(Regime::class, 'regime_id');
    }
}
