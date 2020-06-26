@extends('templates.default')

@section('conteudo')
    <h1>Alunos</h1>

    <form action="/alunos" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" id="id" value="{{$aluno->id}}">

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome *: </label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" name="nome" id="nome" value="{{$aluno->nome}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="telefone" class="col-sm-2 col-form-label">Telefone: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="telefone" id="telefone" value="{{$aluno->telefone}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail *: </label>
            <div class="col-sm-10">
                <input required type="email" class="form-control" name="email" id="email" value="{{$aluno->email}}">
                <div class="text-danger" id="mensagemEmail"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="data_nascimento" class="col-sm-2 col-form-label">Data Nascimento *: </label>
            <div class="col-sm-10">
                <input  type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{$aluno->data_nascimento}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="cep" class="col-sm-2 col-form-label">CEP: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="cep" id="cep" value="{{$aluno->cep}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="logradouro" class="col-sm-2 col-form-label">Logradouro: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{$aluno->logradouro}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="complemento" class="col-sm-2 col-form-label">Complemento: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="complemento" id="complemento" value="{{$aluno->complemento}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="bairro" class="col-sm-2 col-form-label">Bairro: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="bairro" id="bairro" value="{{$aluno->bairro}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="uf" class="col-sm-2 col-form-label">UF: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="uf" id="uf" value="{{$aluno->uf}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="municipio" class="col-sm-2 col-form-label">Município: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="municipio" id="municipio" value="{{$aluno->municipio}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto: </label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            <div class="col-sm-2">
                @if($aluno->foto)
                    <img src="{{asset('storage/' . $aluno->foto)}}" alt="{{$aluno->nome}}" width="50px">
                @else
                    <img src="{{asset('storage/semfoto.jpg')}}" alt="{{$aluno->nome}}" width="50px">
                @endif
            </div>
        </div>
        <div class="text-center">
            <input type="submit" value="Enviar" class="btn btn-success" />
            <a href="/alunos" class="btn btn-danger">Voltar</a>
        </div>

    </form>
@endsection

@section('js')

    <script>

        $(function(){

            $('#cep').change(function(){
                cep = $('#cep').val();

                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    success: function (dados) {
                        $('#logradouro').val(dados.logradouro)
                        $('#complemento').val(dados.complemento)
                        $('#uf').val(dados.uf)
                        $('#municipio').val(dados.localidade)
                        $('#bairro').val(dados.bairro)
                    }
                })
            })

            $('#email').change(function(){

                $.ajax({
                    url: '/alunos/verificar-email-duplicado/' + $('#email').val(),
                    success: function(qtd){

                        if(qtd > 0){
                            $('#mensagemEmail').html("O email [" + $('#email').val() + "] já está cadastrado")
                            $('#email').val('');
                        } else {
                            $('#mensagemEmail').html("")
                        }
                    }
                })

            })
        });
    </script>

@endsection
