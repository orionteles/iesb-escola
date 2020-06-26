<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorFoto extends Model
{
    protected $fillable = ['foto', 'professor_id'];

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
}
