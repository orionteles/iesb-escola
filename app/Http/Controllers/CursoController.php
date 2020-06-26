<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    public function create()
    {
        $curso = new Curso();
        return view('curso.formulario', compact('curso'));
    }

    public function store(Request $request)
    {
        $curso = $request->id ? Curso::find($request->id) : new Curso();

        $curso->fill($request->all());
        $curso->save();

        return redirect('/cursos');
    }

    public function edit($id)
    {
        $curso = Curso::find($id);

        return view('curso.formulario', compact('curso'));
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect('/cursos');
    }

    public function disciplinas(Curso $curso)
    {
        return $curso->disciplinas;
    }
}
