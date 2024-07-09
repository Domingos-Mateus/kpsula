@extends('layoutAluno.template')

@section('conteudo')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/aluno_index">
                <img src="/assets/logo/logo.png" alt="KPSULA" style="height: 50px; width: 80px; vertical-align: middle;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" name="search" type="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                            <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="planoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-family: 'Montserrat', sans-serif;">
                            Plano
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="planoDropdown">
                            <li><a class="dropdown-item" href="/alunos/planos/listar_planos">Planos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-family: 'Montserrat', sans-serif;">
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
        <div id="cont m-0 p-0">
            <br><br><br>
            <h3 class="text-center" style="color: #fff; font-family: 'Montserrat', sans-serif;">Meus Módulos</h3>

            <div class="d-flex justify-content-between align-items-center position-relative">
                <button class="btn btn-outline-light" id="prev" style="height: 320px; display: flex; align-items: center; border: none; background-color: #000000; position: absolute; top: 0; left: 0; z-index: 10;">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-outline-light" id="next" style="height: 320px; display: flex; align-items: center; border: none; background-color: #000000; position: absolute; top: 0; right: 0; z-index: 10;">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <ul class="cursos d-flex" id="carousel">
                    @foreach ($modulos as $modulo)
                        @if($modulo->plano_id == $plano_usuario->plano_id || $plano_usuario->plano_id == 2)
                            @php
                                $primeiro_video = $modulo->videos()->orderBy('posicao_video')->first();
                            @endphp
                            <li class="conteudos" style="color: #fff;">
                                @if ($primeiro_video)
                                    <a href="/alunos/modulos/visualizar_modulo_aluno1/{{ $modulo->id }}/{{ $primeiro_video->id }}">
                                        <div class="card d-flex justify-center">
                                            <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
                                        </div>
                                    </a>
                                @else
                                    <div class="card d-flex justify-center" onclick="showNoVideosModal()">
                                        <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
                                    </div>
                                @endif
                            </li>
                        @else
                            <li class="conteudos" style="color: #fff;">
                                <a href="/alunos/planos/editar_plano_usuario/{{ $plano_usuario->id }}">
                                    <div class="card position-relative">
                                        <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
                                        <div class="card-body"></div>
                                        <div class="position-absolute p-2" style="top: 5%; left: 80%; transform: translate(-50%);">
                                            <i class="fas fa-lock" style="color: red; font-size: 30px;"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal HTML aqui -->
    <div class="modal fade" id="noVideosModal" tabindex="-1" aria-labelledby="noVideosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noVideosModalLabel">Informação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ainda não temos vídeo para este módulo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('next').addEventListener('click', function() {
            document.getElementById('carousel').scrollBy({ left: 300, behavior: 'smooth' });
        });

        document.getElementById('prev').addEventListener('click', function() {
            document.getElementById('carousel').scrollBy({ left: -300, behavior: 'smooth' });
        });

        function showNoVideosModal() {
            var noVideosModal = new bootstrap.Modal(document.getElementById('noVideosModal'));
            noVideosModal.show();
        }
    </script>
@endsection
