@extends('templates.default')

@section('conteudo')
    <h1>Professores</h1>

    <a class="btn btn-warning" href="/professores/create">Novo</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
        </thead>
        <tbody>
        @foreach($professores as $professor)
            <tr>
                <td>
                    <a href="/professores/{{$professor->id}}/edit"><span class="fa fa-edit"></span></a>
                    <a href="/professores/{{$professor->id}}/destroy"><span class="fa fa-trash"></span></a>
                </td>
                <td>{{$professor->nome}}</td>
                <td>{{$professor->matricula}}</td>
                <td>{{$professor->telefone}}</td>
                <td>{{$professor->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
