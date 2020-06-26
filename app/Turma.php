<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = ['disciplina_id', 'professor_id', 'codigo', 'turno', 'semestre'];

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'turma_alunos');
    }

    static public function getTurnos()
    {
        return [
            'M'=>'Matutino',
            'V'=>'Vespertino',
            'N'=>'Noturno'
        ];
    }

    public function getAlunos()
    {
        $alunos = [];

        foreach ($this->alunos as $aluno){
            $alunos[$aluno->id] = $aluno->nome;
        }

        return $alunos;
    }
}
