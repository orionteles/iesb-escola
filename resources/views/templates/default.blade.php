<html>
    <head>
        <title>Projeto Escola</title>

        <link rel="stylesheet" href="{{asset('js/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('js/fa/css/all.css')}}">

        <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
        <script src="{{asset('js/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('js/init.js')}}"></script>

    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Projeto Escola</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/cursos">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/alunos">Alunos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/professores">Professores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/turmas">Turmas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/disciplinas">Disciplinas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/professor">Aulas</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="container" style="margin-top: 60px;">
            @yield('conteudo')
        </main>

        @yield('js')
    </body>
</html>





