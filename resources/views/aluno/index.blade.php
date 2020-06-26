@extends('templates.default')

@section('conteudo')
    <h1>Alunos</h1>

    <a class="btn btn-warning" href="/alunos/create">Novo</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Foto</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alunos as $aluno)
            <tr>
                <td>
                    <a href="/alunos/{{$aluno->id}}/edit"><span class="fa fa-edit"></span></a>
                    <a href="/alunos/{{$aluno->id}}/destroy"><span class="fa fa-trash"></span></a>
                </td>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->telefone}}</td>
                <td>{{$aluno->email}}</td>
                <td>{{$aluno->data_nascimento}}</td>
                <td>
                    @if($aluno->foto)
                        <img src="{{asset('storage/' . $aluno->foto)}}" alt="{{$aluno->nome}}" width="50px">
                    @else
                        <img src="{{asset('storage/semfoto.jpg')}}" alt="{{$aluno->nome}}" width="50px">
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
