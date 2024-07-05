@extends('layoutAluno.template')

@section('conteudo')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/aluno_index">
                <img src="/assets/logo/logo.png" alt="KPSULA" style="height: 50px; width: 80px; vertical-align: middle;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="planoDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Plano
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="planoDropdown">
                            <li><a class="dropdown-item" href="/alunos/planos/listar_planos">Planos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="perfilDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="perfilDropdown">
                            <li><a class="dropdown-item" href="#">Nome do Usuário</a></li>
                            <li><a class="dropdown-item" href="#">Ajuda</a></li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                                     this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </a>
                            </li>
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

        <div id="cont" class="mt-3"> <!-- Reduzir o espaço superior -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title text-white" style="text-align: center;">Meus Conteúdos</h3>
                    </div>
                    <a href="/alunos/modulos/listar_modulo_aluno">
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="/assets/capsula/img/cap.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <!-- Conteúdo do card -->
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- Adicione outros cartões aqui -->
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua os arquivos JavaScript necessários -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
