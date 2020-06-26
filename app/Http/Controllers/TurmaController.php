<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Disciplina;
use App\Professor;
use App\Turma;
use App\TurmaAluno;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turma.index', compact('turmas'));
    }

    public function create()
    {
        $turma = new Turma();
        $turmaAlunos = [];

        $professores = Professor::all();
        $cursos = Curso::all();
        $disciplinas = [];
        $alunos = Aluno::all();

        $turnos = Turma::getTurnos();

        return view('turma.formulario', compact('turma', 'professores', 'cursos', 'disciplinas', 'turnos', 'alunos', 'turmaAlunos'));
    }

    public function store(Request $request)
    {
        $turma = $request->id ? Turma::find($request->id) : new Turma();

        $turma->fill($request->all());
        $turma->save();

        if(!empty($request->alunos)){
            foreach ($request->alunos as $aluno_id){
                TurmaAluno::create(['aluno_id'=>$aluno_id, 'turma_id'=>$turma->id]);
            }
        }

        return redirect('/turmas');
    }

    public function edit($id)
    {
        $turma = Turma::find($id);
        $turmaAlunos = $turma->getAlunos();

        $professores = Professor::all();
        $disciplinas = Disciplina::all();
        $turnos = Turma::getTurnos();
        $alunos = Aluno::all();
        $cursos = Curso::all();


        return view('turma.formulario', compact('turma', 'professores', 'cursos', 'disciplinas', 'turnos', 'alunos', 'turmaAlunos'));
    }

    public function destroy($id)
    {
        $turma = Turma::find($id);
        $turma->delete();

        return redirect('/turmas');
    }

    public function verificarCodigoDuplicado($codigo)
    {
        return Turma::where('codigo', $codigo)->count();
    }

    public function alunos(Turma $turma)
    {
        $alunos = $turma->alunos;
        return view('turma.alunos', compact('alunos'));
    }
}
