<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_access extends Model
{
    use HasFactory;

    
    protected $table = 'user_access';
    public $timestamps = false;
    protected $fillable = array('nome');
}
