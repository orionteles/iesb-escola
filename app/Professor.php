<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $table = 'professores';

    protected $fillable = [
        'nome',
        'matricula',
        'cpf',
        'telefone',
        'email',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'uf',
        'municipio',
    ];

    public function fotos()
    {
        return $this->hasMany('App\ProfessorFoto');
    }
}
