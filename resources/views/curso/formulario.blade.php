@extends('templates.default')

@section('conteudo')

    <h1>Cursos</h1>

    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header">Dados Gerais</div>
                <div class="card-body">
                    <form action="/cursos" method="post">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{$curso->id}}">

                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nome" id="nome" value="{{$curso->nome}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duracao" class="col-sm-2 col-form-label">Duração: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="duracao" id="duracao" value="{{$curso->duracao}}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a class="btn btn-danger" href="/cursos">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header">Disciplinas</div>
                <div class="card-body">
                    <ul>
                        @foreach($curso->disciplinas as $disciplina)
                            <li>{{$disciplina->nome}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
