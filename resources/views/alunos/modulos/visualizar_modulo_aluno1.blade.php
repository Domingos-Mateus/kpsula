<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    <title>Página de Vídeo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <br><br>
    <div class="container-fluid">
        <br><br><br><br>

        <!-- Header -->
        <div class="row bg-dark text-white p-2 align-items-center">
            <div class="col">
                <a href="/aluno_index" class="text-white"><i class="fas fa-arrow-left"></i> Voltar para o Portal</a>
            </div>

            <div class="col text-right">
                @if($progressoAluno->concluida)
                    <a href="{{ route('progresso.toggle', $progressoAluno->id) }}">
                        <button class="btn btn-sm btn-success mr-2">Concluída</button>
                    </a>
                @else
                    <a href="{{ route('progresso.toggle', $progressoAluno->id) }}">
                        <button class="btn btn-sm btn-outline-light mr-2">Marcar como concluída</button>
                    </a>
                @endif

                @php
                    $currentVideoIndex = $videos->search(function ($v) use ($video) {
                        return $v->id == $video->id;
                    });
                @endphp

                <a href="{{ $currentVideoIndex > 0 ? route('video.anterior', [$modulo->id, $video->id]) : '#' }}">
                    <button class="btn btn-sm btn-outline-light mr-2" {{ $currentVideoIndex > 0 ? '' : 'disabled' }}>
                        <i class="fas fa-chevron-left"></i> Anterior
                    </button>
                </a>

                <a href="{{ $currentVideoIndex < $videos->count() - 1 ? route('video.proximo', [$modulo->id, $video->id]) : '#' }}">
                    <button class="btn btn-sm btn-outline-light mr-2" {{ $currentVideoIndex < $videos->count() - 1 ? '' : 'disabled' }}>
                        Próximo <i class="fas fa-chevron-right"></i>
                    </button>
                </a>

                <!-- Botão de Anotação -->
                <button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal" data-target="#notesModal">Anotação</button>

                <a href="/alunos/modulos/listar_modulo_aluno">
                    <button class="btn btn-sm btn-outline-light">Ver Módulos</button>
                </a>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <!-- Stars Rating -->
        <div class="row bg-dark text-white p-2">
            <div class="col text-center">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-md-8 p-3">
                <div class="video-container">
                    <!-- Embed Video -->
                    @if($video)
                    <p width="100%" height="450">{!! $video->link_video !!}</p>
                    @else
                        <p>Nenhum vídeo disponível</p>
                    @endif
                </div>
                <h4 class="mt-3" id="videoTitle">{{ $video ? $video->nome_video : '' }}</h4>
                <p>Assista no <a href="{{ $video ? $video->link_video : '#' }}" class="text-primary" id="videoLink">YouTube</a></p>
            </div>
            <div class="col-md-4 p-3 bg-dark text-white">
                <h5>{{ $modulo->nome_modulo }} <span class="float-right">0%</span></h5>
                <ul class="timeline list-unstyled">
                    @foreach($videos as $video)
                        <li class="timeline-item {{ $video->id == $progressoAluno->video_id ? 'active' : '' }}">
                            @if($video->id == $progressoAluno->video_id)
                                <span class="timeline-dot"></span>
                            @endif
                            <a href="{{ $video->id }}" class="text-white">{{ $video->nome_video }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal para Anotações -->
    <div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="notesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notesModalLabel" style="color: gray;">Anotações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/anotacoes" method="post">
                    @csrf <!-- Inclui um token CSRF para segurança -->
                    <div class="modal-body">
                        @foreach($anotacoes as $anotacao)
                        <p style="color: blue;">{{$anotacao->descricao}}</p>
                        @endforeach

                        <input type="text" name="descricao" class="form-control" placeholder="Escreva uma nova anotação...">
                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Anotar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        function addComment() {
            var newComment = $('#newComment').val();
            if (newComment) {
                $('#commentList').append('<li>' + newComment + '</li>');
                $('#newComment').val(''); // Clear the input after adding
            }
        }
    </script>
</body>
</html>
