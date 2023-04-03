<?php

namespace App\Models\Calendario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'calendario__regimes';
    public $timestamps = false;
    protected $fillable = array('nome');

    public function periodos(){

        return $this->hasMany(Periodo::class,'periodo_id');
    }
}
