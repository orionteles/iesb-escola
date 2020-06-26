@if(count($alunos))
    <div class="row">
        @foreach($alunos as $aluno)
            <div class="col-sm-3">
                <div class="card">

                    @if($aluno->foto)
                        <img src="{{asset('storage/' . $aluno->foto)}}" class="card-img-top img-fluid" height="50px" alt="{{$aluno->nome}}">
                    @else
                        <img src="{{asset('storage/semfoto.jpg')}}" class="card-img-top img-fluid" height="50px" alt="{{$aluno->nome}}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$aluno->nome}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-danger">
        Nenhum aluno cadastrado nessa turma!
    </div>
@endif
