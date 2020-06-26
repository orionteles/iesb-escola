@extends('templates.default')

@section('conteudo')
    <h1>Alunos</h1>

    <form action="/alunos/recado" method="post">
        @csrf

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Recado *: </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="recado" id="recado" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" value="Enviar" class="btn btn-success" />
            <a href="/alunos" class="btn btn-danger">Voltar</a>
        </div>

    </form>
@endsection
