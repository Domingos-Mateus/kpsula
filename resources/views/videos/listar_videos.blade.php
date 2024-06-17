@extends('layout.template')

@section('conteudo')

<br><br><br><br><br>
<!-- Menu -->
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Vídeos</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/videos/registar_video">Adicionar Vídeo</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vídeos</h4>
                        <p class="card-description">Uma coleção de vídeos destacados.</p>

                        <!-- Linha de Cards -->
                        <div class="row">
                            @foreach($videos as $video)
                            <br><br>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <a href="{{ url('/videos/visualizar_video/'.$video->id) }}" class="text-decoration-none" style="color: inherit;">
                                        <img src="{{ $video->imagem }}" class="card-img-top" alt="Vídeo {{ $loop->iteration }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $video->nome_video }}</h5>
                                            <p class="card-text">{{ Str::limit($video->descricao, 100) }}</p>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <small class="text-muted">Adicionado em: {{ $video->created_at->format('d/m/Y') }}</small>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ url('/videos/visualizar_video/'.$video->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                                            <!-- Botão de Eliminar -->

                                                <a href="eliminar_video/{{ $video->id }}"><button type="submit" class="btn btn-danger btn-sm">Eliminar</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Paginação -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $videos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="www.devaholic.ao" target="_blank">DevAholic</a>. Todos os direitos reservados.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito com <i class="mdi mdi-heart text-danger"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
<!-- page-body-wrapper ends -->
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<script src="../../assets/js/jquery.cookie.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<!-- End custom js for this page -->
@endsection
