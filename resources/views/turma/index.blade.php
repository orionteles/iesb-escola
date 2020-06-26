@extends('templates.default')

@section('conteudo')

    <h1>Turmas</h1>

    <a class="btn btn-warning" href="/turmas/create">Novo</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Código</th>
            <th>Turno</th>
            <th>Disciplina</th>
            <th>Professor</th>
        </tr>
        </thead>
        <tbody>
        @foreach($turmas as $turma)
            <tr>
                <td>
                    <a href="/turmas/{{$turma->id}}/edit"><span class="fa fa-edit"></span></a>
                    <a href="/turmas/{{$turma->id}}/destroy" class="excluir"><span class="fa fa-trash"></span></a>
                    <a href="/turmas/{{$turma->id}}/alunos" class="carometro" ><span class="fa fa-users"></span></a>
                </td>
                <td>{{$turma->id}}</td>
                <td>{{$turma->codigo}}</td>
                <td>{{$turma->turno}}</td>
                <td>{{$turma->professor->nome}}</td>
                <td>{{$turma->disciplina->nome}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modal-carometro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="carometro">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            $('.carometro').click(function(){

                // $.ajax({
                //     url: $(this).attr('href'),
                //     success: function (dados) {
                //         $('#carometro').html(dados)
                //         $('#modal-carometro').modal();
                //     }
                // })

                $('#carometro').load($(this).attr('href'), function () {
                    $('#modal-carometro').modal();
                })

                return false;
            });
        })
    </script>
@endsection
