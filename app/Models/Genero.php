<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    
    protected $table = 'genero';
    public $timestamps = false;
    protected $fillable = array('nome');

    public function estudantes(){

        return $this->hasMany(User::class, 'genero_id');
    }
}
