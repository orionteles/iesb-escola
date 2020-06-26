<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/turmas');
});

Route::middleware('auth')->group(function (){
    Route::resource('/disciplinas', 'DisciplinaController');
    Route::get('/disciplinas/{id}/destroy', 'DisciplinaController@destroy');

    Route::resource('/cursos', 'CursoController');
    Route::get('/cursos/{id}/destroy', 'CursoController@destroy');
    Route::get('cursos/{curso}/disciplinas', 'CursoController@disciplinas');

    Route::get('/alunos/recado', 'AlunoController@recado');
    Route::post('/alunos/recado', 'AlunoController@enviarRecado');
    Route::resource('/alunos', 'AlunoController');
    Route::get('/alunos/{aluno}/destroy', 'AlunoController@destroy');
    Route::get('/alunos/verificar-email-duplicado/{email}', 'AlunoController@verificarEmailDuplicado');

    Route::resource('/professores', 'ProfessorController');
    Route::get('/professores/{professor}/destroy', 'ProfessorController@destroy');

    Route::resource('/turmas', 'TurmaController');
    Route::get('/turmas/{turma}/destroy', 'TurmaController@destroy');
    Route::get('/turmas/verificar-codigo-duplicado/{codigo}', 'TurmaController@verificarCodigoDuplicado');
    Route::get('/turmas/{turma}/alunos', 'TurmaController@alunos');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
