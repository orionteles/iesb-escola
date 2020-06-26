@extends('templates.default')

@section('conteudo')

    <h1>Turmas</h1>

    <form action="/turmas" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$turma->id}}">
        <div class="row">
            <div class="col-6">
                <div class="card border-dark mb-3">
                    <div class="card-header">Dados da Turma</div>
                    <div class="card-body text-dark">

                        <div class="form-group row">
                            <label for="codigo" class="col-sm-3 col-form-label">Código *: </label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="codigo" id="codigo" value="{{$turma->codigo}}">
                                <div class="text-danger" id="mensagem-codigo"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turno" class="col-sm-3 col-form-label">Turno *: </label>
                            <div class="col-sm-9">
                                <select name="turno" id="turno" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach($turnos as $turno => $descricao)
                                        <option value="{{$turno}}">{{$descricao}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semestre" class="col-sm-3 col-form-label">Semestre *: </label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="semestre" id="semestre" value="{{$turma->semestre}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-3 col-form-label">Professor: </label>
                            <div class="col-sm-9">
                                <select name="professor_id" id="professor_id" class="form-control">
                                    <option value="">Selecione:</option>
                                    @foreach($professores as $professor)
                                        <option {{ $turma->professor_id == $professor->id ? 'selected' : '' }} value="{{$professor->id}}">{{$professor->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-3 col-form-label">Curso: </label>
                            <div class="col-sm-9">
                                <select name="curso_id" id="curso_id" class="form-control">
                                    <option value="">Selecione:</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-3 col-form-label">Disciplina: </label>
                            <div class="col-sm-9">
                                <select name="disciplina_id" id="disciplina_id" class="form-control">
                                    <option value="">Selecione:</option>
                                    @foreach($disciplinas as $disciplina)
                                        <option {{ $turma->disciplina_id == $disciplina->id ? 'selected' : '' }} value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card border-dark mb-3">
                    <div class="card-header">Alunos</div>
                    <div class="card-body text-dark">
                        <input type="hidden" name="id" id="id" value="{{$turma->id}}">
                        @foreach($alunos as $aluno)
                            <div>
                                <input {{ key_exists($aluno->id, $turmaAlunos) ? 'checked' : '' }} type="checkbox" name="alunos[]" id="aluno_{{$aluno->id}}" value="{{$aluno->id}}">
                                <label for="aluno_{{$aluno->id}}">{{$aluno->nome}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="/turmas">Voltar</a>
        </div>

    </form>
@endsection

@section('js')
    <script>
        $(function(){
            $('#curso_id').change(function(){

                $.ajax({
                    url: '/cursos/' + $('#curso_id').val() + '/disciplinas',
                    success: function(disciplinas){

                        disciplinas.sort(function(a, b){
                            return +(a.nome > b.nome) || +(a.nome === b.nome) - 1;
                        })

                        $('#disciplina_id').html('<option value="">Selecione</option>')
                        disciplinas.forEach(function (disciplina) {
                            $('#disciplina_id').append('<option value="'+disciplina.id+'">'+disciplina.nome+'</option>')
                        })
                    }
                })
            });

            $('#codigo').change(function () {
                $.ajax({
                    url: '/turmas/verificar-codigo-duplicado/' + $('#codigo').val(),
                    success: function (qtd) {
                        if(qtd>0){
                            $('#mensagem-codigo').html('O código [' + $('#codigo').val() + '] já está sendo usado! Favor escolher outro.')
                        } else {
                            $('#mensagem-codigo').html('');
                        }
                    }
                })
            })
        })
    </script>
@endsection
