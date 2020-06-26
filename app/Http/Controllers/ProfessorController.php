<?php

namespace App\Http\Controllers;

use App\Professor;
use App\ProfessorFoto;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::all();
        return view('professor.index', compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professor = new Professor();
        return view('professor.formulario', compact('professor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $professor = $request->id ? Professor::find($request->id) : new Professor();
        $professor->fill($request->all());

        $professor->save();

        if($request->hasFile('fotos')){
            foreach ($request->fotos as $foto){

                $aTiposValidos = ['image/jpeg', 'image/png', 'image/bmp', 'image/gif'];

                if(in_array($foto->getMimeType(), $aTiposValidos)){
                    $caminho = $foto->store('professores');
                    ProfessorFoto::create(['foto'=>$caminho, 'professor_id'=>$professor->id]);
                }
            }
        }

        return redirect('/professores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Professor::find($id);
        return view('professor.formulario', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect('/professores');
    }
}
