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



            <div class="row">
                <div class="col-12">
                    <h3 class="main-title text-center text-white">Todos os conteúdos</h3>
                </div>
                <div class="conteudos">
                    @foreach ($modulos as $modulo)
    @if($modulo->plano_id == $plano_usuario->plano_id || $plano_usuario->plano_id == 2)
        <a href="/alunos/modulos/visualizar_modulo_aluno1/{{ $modulo->id }}">
            <div class="card">
                <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
            </div>
        </a>
    @else
        <div class="card position-relative">
            <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="Descrição da imagem">
            <div class="card-body">
            </div>
            <div class="position-absolute top-0 end-0 p-2">
                <i class="fas fa-lock" style="color: red; font-size: 24px;"></i>
            </div>
        </div>
    @endif
@endforeach

                </div>
            </div>
        </div>
    </div>

