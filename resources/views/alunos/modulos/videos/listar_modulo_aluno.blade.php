<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/capsula/css/style.css">
    <link rel="stylesheet" href="/assets/capsula/bootstrap/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: black;
    }

    .navbar {
        background-color: #444;
        border-bottom: 1px solid #555;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .banner {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        top: 56px;
        width: 100%;
        z-index: 999;
    }

    .conteudos {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: space-around;
        margin-top: 150px;
    }

    .card {
        transition: transform 0.3s ease;
        background-color: #222;
        border: none;
        color: #fff;
        border-radius: 80px;
        height: 400px;
        width: 160px;
        overflow: hidden;
        padding: 10px;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card img {
        max-height: 2500px;
        width: 160px;
        object-fit: cover;
        border-radius: 50px;

    }

    .card h1 {
        font-size: 1.5em;
        margin-top: 10px;
    }

    .container {
        margin-top: 20px;
    }
</style>
<body>

    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">KPSULA</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Plano
                </button>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Planos</a></li>
                    <li><a class="dropdown-item" href="#">Meu Plano</a></li>
                    <li><a class="dropdown-item" href="#">Meu Plano</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Perfil
                </button>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Nome do Usuário</a></li>
                    <li><a class="dropdown-item" href="#">Ajuda</a></li>
                    <li><a class="dropdown-item" href="#"><!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                         @csrf

                         <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                             this.closest('form').submit();">
                             {{ __('Log Out') }}
                         </x-dropdown-link>
                     </form></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner">
        <h1>Banner Fixo</h1>
    </div>

    <div id="cont">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">Todos os conteúdos</h3>
                </div>
                <div class="conteudos">
                    @foreach ($modulos as $modulo)
                    <a href="/alunos/modulos/visualizar_modulo_aluno/{{ $modulo->id }}">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ $modulo->foto_modulo }}" class="card-img-top" alt="">
                                <h1>{{ $modulo->nome_modulo }}</h1>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <script src="/assets/capsula/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
