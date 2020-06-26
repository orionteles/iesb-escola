@extends('templates.default')

@section('conteudo')
    <h1>Professores</h1>

    <div class="row">
        <div class="col-6">
            <div class="card border-dark mb-3">
                <div class="card-header">Dados Gerais</div>
                <div class="card-body text-dark">
                    <form action="/professores" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{$professor->id}}">

                        <div class="form-group row">
                            <label for="nome" class="col-sm-4 col-form-label">Nome *: </label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" name="nome" id="nome" value="{{$professor->nome}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matricula" class="col-sm-4 col-form-label">Matrícula *: </label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" name="matricula" id="matricula" value="{{$professor->matricula}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-sm-4 col-form-label">CPF *: </label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" name="cpf" id="cpf" value="{{$professor->cpf}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-sm-4 col-form-label">Telefone: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="telefone" id="telefone" value="{{$professor->telefone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">E-mail *: </label>
                            <div class="col-sm-8">
                                <input required type="email" class="form-control" name="email" id="email" value="{{$professor->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cep" class="col-sm-4 col-form-label">CEP: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cep" id="cep" value="{{$professor->cep}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logradouro" class="col-sm-4 col-form-label">Logradouro: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{$professor->logradouro}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complemento" class="col-sm-4 col-form-label">Complemento: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="complemento" id="complemento" value="{{$professor->complemento}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bairro" class="col-sm-4 col-form-label">Bairro: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="bairro" id="bairro" value="{{$professor->bairro}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uf" class="col-sm-4 col-form-label">UF: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="uf" id="uf" value="{{$professor->uf}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="municipio" class="col-sm-4 col-form-label">Município: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="municipio" id="municipio" value="{{$professor->municipio}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fotos" class="col-sm-4 col-form-label">Fotos: </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="fotos[]" id="fotos" multiple>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Enviar" class="btn btn-success" />
                            <a href="/professores" class="btn btn-danger">Voltar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-dark mb-3">
                <div class="card-header">Fotos</div>
                <div class="card-body text-dark">
                    @if(count($professor->fotos))
                        <div class="row">
                            @foreach($professor->fotos as $foto)
                                <div class="col-sm-4">
                                    <img src="{{asset('storage/' . $foto->foto)}}" class="img-thumbnail" alt="Foto do Professor">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-danger">
                            Nenhuma foto cadastrada!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
