@extends('layoutAluno.template')

@section('conteudo')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KPSULA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" name="search" type="search" placeholder="Pesquisar" aria-label="Search" value="{{ request('search') }}">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="planoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plano
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="planoDropdown">
                            <li><a class="dropdown-item" href="/alunos/planos/listar_planos">Planos</a></li>
                            <!--<li><a class="dropdown-item" href="/alunos/planos/plano_invidual_user">Meu Plano</a></li>-->
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
    <div id="cont m-0 p-0">

        <br><br><br>
        <h3 class="text-center" style="color: #fff;">Meus Modulos</h3>

    <div class="">
        <div class="">
            <ul class="cursos position-relative">
                <div style="position: absolute; top: 0; z-index: 99; color: #fff;">
                    Recuar
                </div>
                <div style="position: absolute; top: 0; z-index: 99; right: 0; color: #fff;">
                    Avançar
                </div>
                @foreach ($modulos as $modulo)
                @if($modulo->plano_id == $plano_usuario->plano_id || $plano_usuario->plano_id == 2)

                <li class="conteudos" style="color: #fff;">

            <a href="/alunos/modulos/visualizar_modulo_aluno1/{{ $modulo->id }}">
                <div class="card d-flex justify-center">
                    <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
                </div>
            </a>

        </li>
        @else
        <li class="conteudos" style="color: #fff;">
        <a href="/alunos/planos/editar_plano_usuario/{{ $plano_usuario->id }}">
            <div class="card position-relative">
                <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
                <div class="card-body">
                </div>
                <div class="position-absolute p-2" style="top: 30%; left: 50%; transform: translate(-50%);">
                    <i class="fas fa-lock" style="color: red; font-size: 100px;"></i>
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
    </div>

