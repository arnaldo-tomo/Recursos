<?php

namespace App\Models\Propinas;


use Illuminate\Database\Eloquent\Model;
use App\Models\Propinas\Pagamento_propinas;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Tpagamento extends Model{
    use HasFactory;

    protected $table = 'tpagamento';
    public $timestamps = false;
    protected $fillable = array('nome','descricao');

    public function pagamentos(){

        return $this->hasMany(Pagamento_propinas::class, 'tpagamento_id');
    }

    public function pagamento()
    {
        return $this->belongsTo(Pagamento_propinas::class, 'tpagamento_id');
    }

}
