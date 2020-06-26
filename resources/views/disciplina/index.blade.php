@extends('templates.default')

@section('conteudo')

    <h1>Disciplinas</h1>

    <a class="btn btn-warning" href="/disciplinas/create">Novo</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome</th>
            <th>Curso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($disciplinas as $disciplina)
            <tr>
                <td>
                    <a href="/disciplinas/{{$disciplina->id}}/edit"><span class="fa fa-edit"></span></a>
                    <a href="/disciplinas/{{$disciplina->id}}/destroy" class="excluir"><span class="fa fa-trash"></span></a>
                </td>
                <td>{{$disciplina->id}}</td>
                <td>{{$disciplina->nome}}</td>
                <td>{{$disciplina->curso->nome}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
