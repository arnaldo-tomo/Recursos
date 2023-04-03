<?php

namespace App\Models;

use App\Models\User_access;
use App\Models\Escola\Disciplina;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Estudante\Dados_academicos;
use App\Models\Docente\Dados_academicos as Docente_Dados_academicos;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'codigo',
        'apelido',
        'name',
        'email',
        'password',
        'genero_id',
        'data_nasc',
        'contacto',
        'contacto_alternativo',
        'morada',
        'distrito',
        'provincia',
        'bilhete_identificacao',
        'foto',
        'user_access_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function user_access()
    {

        return $this->belongsTo(User_access::class, 'user_access_id');
    }

    public function genero()
    {

        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function dados_academicos_estudante()
    {

        return $this->hasOne(Dados_academicos::class, 'estudante_id');
    }

    public function dados_academicos_docente()
    {

        return $this->hasOne(Docente_Dados_academicos::class, 'professor_id');
    }

    public function disciplinas(): BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class, 'escola__disciplina_docentes', 'disciplina_id', 'docente_id');
    }

    public function docente()
    {

        return $this->hasOne(Dados_academicos::class, 'professor_id');
    }
}
