@extends('templates.default')

@section('conteudo')

    <h1>Disciplinas</h1>

    <form action="/disciplinas" method="post">
        @csrf

        <input type="hidden" name="id" id="id" value="{{$disciplina->id}}">
        
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" id="nome" value="{{$disciplina->nome}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="curso_id" class="col-sm-2 col-form-label">Curso: </label>
            <div class="col-sm-10">
                <select required name="curso_id" id="curso_id" class="form-control" >
                    <option value="">Selecione</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="/disciplinas">Voltar</a>
        </div>
    </form>

@endsection