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
<div class="container mt-5 pt-5">
    <h1 class="my-4" style="text-align: center; color: blue">Nossos Planos</h1>
    <div class="mb-3">
        <a href="/alunos/planos/assinar_plano_usuario" class="btn btn-primary">Assinar Plano</a>
        <a href="/aluno_index" class="btn btn-secondary">Cancelar</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nome do Plano</th>
                <th>Preço</th>
                <th>Dias</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planos as $plano)
            <tr>
                <td>{{ $plano->id }}</td>
                <td>{{ $plano->nome_plano }}</td>
                <td>{{ $plano->preco }}</td>
                <td>{{ $plano->dias }}</td>
                <td>{{ $plano->descricao }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
