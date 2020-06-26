<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aluno = new Aluno();
        return view('aluno.formulario', compact('aluno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $aluno = $request->id ? Aluno::find($request->id) : new Aluno();
        $aluno->fill($request->all());

        // Verificando se o arquivo existe e é válido
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $aTiposValidos = ['image/jpeg', 'image/png', 'image/bmp', 'image/gif'];

            // Verificando se o arquivo enviado é uma imagem
            if(in_array($request->file('foto')->getMimeType(), $aTiposValidos)){
                $foto = $request->file('foto')->store('alunos');
                $aluno->foto = $foto;
            }
        }

        $aluno->save();

        return redirect('/alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('aluno.formulario', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect('/alunos');
    }

    public function verificarEmailDuplicado($email)
    {
        return Aluno::where('email', $email)->count();
    }

    public function recado()
    {
        return view('aluno.recado');
    }

    public function enviarRecado(Request $request)
    {
        Mail::send('emails.recado', ['recado'=>$request->recado], function($m){
            $m->from('orionteles@gmail.com', 'Sistema Acadêmico');
            $m->to('teste@gmail.com');
        });

        return redirect('/alunos/recado');
    }
}
