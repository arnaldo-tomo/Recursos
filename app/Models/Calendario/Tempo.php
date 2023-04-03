<?php

namespace App\Models\Calendario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempo extends Model
{
    use HasFactory;
    protected $table = 'calendario__tempos';
    public $timestamps = false;
    protected $fillable = array('tempo','inicio','fim','turno_id');


  public function turno(){

    return $this->belongsTo(Turno::class,'turno_id');
  }

  
}
