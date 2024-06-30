@extends('layoutAluno.template')

@section('conteudo')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KPSULA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="planoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plano
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="planoDropdown">
                            <li><a class="dropdown-item" href="/alunos/planos/listar_planos">Planos</a></li>
                            <li><a class="dropdown-item" href="#">Meu Plano</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="perfilDropdown">
                            <li><a class="dropdown-item" href="#">Nome do Usuário</a></li>
                            <li><a class="dropdown-item" href="#">Ajuda</a></li>
                            <li><a class="dropdown-item" href="#">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                                 this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="banner"></div>
            </div>
        </div>

        <div id="cont">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">Meus Conteúdos</h3>
                    </div>
                    <a href="/alunos/modulos/listar_modulo_aluno">
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="/assets/capsula/img/cap.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h2 class="card-title">Kapsula</h2>
                                    <p class="card-text">Financeira</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- Adicione outros cartões aqui -->
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/capsula/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
