<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nome', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
