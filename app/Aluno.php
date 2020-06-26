<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'data_nascimento',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'uf',
        'municipio',
    ];
}
