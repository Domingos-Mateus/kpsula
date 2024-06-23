<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $modulos->nome_modulo }} - Curso de Criptomoedas</title>
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
    <style>
        /* Estilos gerais para o modo dark */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        /* Navbar */
        .navbar.dark-mode {
            background-color: #1e1e1e;
            border-bottom: 1px solid #444;
        }

        .navbar .course-title.dark-mode {
            color: #ffffff;
        }

        /* Botão de volta */
        .back-button.dark-mode {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }

        /* Seções principais */
        .main-content.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .video-section.dark-mode .video-details h3,
        .video-section.dark-mode .video-details p {
            color: #ffffff;
        }

        /* Seção de vídeo */
        .video-section.dark-mode .no-video-placeholder p {
            color: #cccccc;
        }

        /* Barra lateral */
        .sidebar.dark-mode {
            background-color: #1e1e1e;
        }

        .sidebar.dark-mode h2,
        .sidebar.dark-mode a {
            color: #ffffff;
        }

        .sidebar.dark-mode .modules-list li a {
            color: #bbbbbb;
        }

        .sidebar.dark-mode .modules-list li a:hover {
            color: #ffffff;
        }

        /* Botão de alternância de módulos */
        .toggle-modules.dark-mode {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }

        /* Barra de progresso */
        .progress.dark-mode .progress-bar {
            background-color: #444;
        }

        .progress.dark-mode span {
            color: #ffffff;
        }
    </style>
</head>
<body class="dark-mode">
    <div class="navbar dark-mode">
        <a href="/aluno_index"><button class="back-button dark-mode">← Voltar para o Portal</button></a>
        <div class="course-title dark-mode">{{ $modulos->nome_modulo }} >
            @if($primeiro_video)
                {{ $primeiro_video->nome_video }}
            @else
                Nenhum vídeo disponível
            @endif
        </div>
    </div>
    <div class="main-content dark-mode">
        <div class="video-section dark-mode">
            <div class="video-details">
                @if($primeiro_video)
                    <h3>{{ $primeiro_video->nome_video }}</h3>
                    <p>{{ $primeiro_video->descricao }}</p>
                @else
                    <h3>Sem vídeo disponível</h3>
                    <p>Nenhum vídeo foi encontrado para este módulo.</p>
                @endif
                <div class="rating" id="rating">
                    <!-- Estrelas dinâmicas serão inseridas aqui -->
                </div>
                <!-- Ações de vídeo removidas por agora -->
            </div>
            @if($primeiro_video)
                <iframe src="{{ $primeiro_video->link_video }}" frameborder="0" allowfullscreen></iframe>
            @else
                <div class="no-video-placeholder">
                    <p>Nenhum vídeo disponível para este módulo.</p>
                </div>
            @endif
        </div>
        <div class="sidebar dark-mode">
            <a href="/alunos/modulos/listar_modulo_aluno"><button class="toggle-modules dark-mode">Ver Módulos</button></a>
            <h2>{{ $modulos->nome_modulo }}</h2>
            <div class="progress dark-mode">
                <div class="progress-bar" style="width: 0%;"></div>
                <span>0%</span>
            </div>
            <ul class="modules-list">
                @foreach($videos as $video)
                    <li>
                        <a href="{{ route('videos.show', $video->id) }}">
                            {{ $video->nome_video }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="{{ asset('assets/script.js') }}"></script>
</body>
</html>
