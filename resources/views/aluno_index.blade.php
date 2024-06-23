<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capsula</title>

    <link rel="stylesheet" href="/assets/capsula/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/capsula/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/assets/capsula/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 100px; /* Espaço suficiente para navbar */
        }

        .navbar {
            background-color: #222;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1030;
        }

        .banner {
            height: 250px; /* Banner centralizado */
            background: url('/assets/capsula/img/v.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 10px;
            margin: 20px auto;
        }

        .container {
            margin-top: 20px; /* Espaço ajustado após o banner */
        }

        .card {
            transition: transform 0.3s ease;
            background-color: #222;
            border: none;
            color: #fff;
            border-radius: 10px;
            height: 200px; /* Ajustando altura para ser retangular */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .main-title {
            color: #fff;
            text-align: center;
            margin-top: 20px;
        }

        .profile-img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .dropdown-menu-dark .dropdown-item {
            color: #fff;
        }

        .dropdown-menu-dark .dropdown-item:hover {
            background-color: #444;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #fff;
        }

        .search-bar {
            width: 200px;
        }

        .dropdown-item-text {
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="/aluno_index">KPSULA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2 search-bar" type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="planDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Planos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="planDropdown">
                            <li><a class="dropdown-item" href="#">Planos</a></li>
                            <li><a class="dropdown-item" href="#">Meu Plano</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/capsula/img/profile.jpg" class="profile-img" alt="Profile">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><span class="dropdown-item-text">Nome do Usuário</span></li>
                            <li><a class="dropdown-item" href="#">Ajuda</a></li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
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
</body>
</html>
