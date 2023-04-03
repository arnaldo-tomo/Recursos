<?php

namespace App\Models\Propinas;

use App\Models\Estudante\Dados_academicos;
use App\Models\Mes;
use App\Models\Propinas\Propinas;
use App\Models\Propinas\Tpagamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Pagamento_propinas extends Model
{
    use HasFactory;

    protected $table = 'pagamento_propinas';
    public $timestamps = false;
    protected $fillable = array('Estudante_id', 'Propina_id', 'Data_pagamento', 'Estado', 'user_id', 'Mes_id', 'tpagamento_id');


    public function mes()
    {
        return $this->belongsTo(Mes::class, 'Mes_id');
    }

    public function propina()
    {

        return $this->belongsTo(Propinas::class, 'Propina_id');
    }

    public function tpagamento()
    {

        return $this->belongsTo(Tpagamento::class, 'tpagamento_id');
    }

    public function estudante()
    {

        return $this->belongsTo(Dados_academicos::class, 'Estudante_id');
    }
}
