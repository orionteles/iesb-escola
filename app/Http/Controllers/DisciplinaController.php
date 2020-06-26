<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplina.index', compact('disciplinas'));
    }

    public function create()
    {
        $disciplina = new Disciplina();
        $cursos = Curso::all();
        return view('disciplina.formulario', compact('disciplina', 'cursos'));
    }

    public function store(Request $request)
    {
        $disciplina = $request->id ? Disciplina::find($request->id) : new Disciplina();

        $disciplina->fill($request->all());
        $disciplina->save();

        return redirect('/disciplinas');
    }

    public function edit($id)
    {
        $disciplina = Disciplina::find($id);
        $cursos = Curso::all();

        return view('disciplina.formulario', compact('disciplina', 'cursos'));
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);
        $disciplina->delete();

        return redirect('/disciplinas');
    }
}
