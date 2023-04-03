<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidade extends Model
{
    use HasFactory;
    
    protected $table = 'universidades';
    public $timestamps = false;
    protected $fillable = array('nome');
    
  
}
