<?php

namespace App\Models;

use App\Models\Escola\Propinas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    use HasFactory;

    
    protected $table = 'mes';
    public $timestamps = false;
    protected $fillable = array('Mes');

    public function propinas(){

        return $this->hasMany(Propinas::class, 'Mes_id');
    }
}
