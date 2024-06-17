@extends('layout.template')

@section('conteudo')
    <br><br><br><br><br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Visualizar Módulo</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/modulos/listar_modulos">Voltar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visualizar Módulo</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $modulos->nome_modulo }}</h4>
                            <p class="card-description">{{ $modulos->descricao }}</p>

                            <!-- Exibir a imagem do módulo, se existir -->
                            @if($modulos->foto_modulo)
                                <div class="mb-4">
                                    <img src="{{ asset($modulos->foto_modulo) }}" alt="Imagem do Módulo" width="300">
                                </div>
                            @endif

                            <!-- Botão para adicionar vídeo -->
                            <div class="mb-4">
                                <a href="{{ route('videos.create', $modulos->id) }}" class="btn btn-gradient-primary">Adicionar Vídeo</a>
                            </div>

                            <!-- Exibir os vídeos relacionados -->
                            <h4 class="card-title mt-4">Vídeos Relacionados</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome do Vídeo</th>
                                            <th>Descrição</th>
                                            <th>Link</th>
                                            <th>Imagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($videos as $video)
                                            <tr>
                                                <td>{{ $video->nome_video }}</td>
                                                <td>{{ $video->descricao }}</td>
                                                <td><a href="/videos/visualizar_video/{{$video->id}}" >Ver Vídeo</a></td>
                                                <td>
                                                    @if($video->imagem)
                                                        <img src="{{ asset($video->imagem) }}" alt="Imagem do Vídeo" width="150">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Botão Editar -->
                                                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                                    <!-- Botão Deletar -->
                                                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este vídeo?');">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Nenhum vídeo encontrado para este módulo.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Links de Paginação -->
                            <div class="mt-4">
                                {{ $videos->links() }}
                            </div>

                            <!-- Botão Voltar -->
                            <div class="mt-4">
                                <a href="/modulos/listar_modulos" class="btn btn-gradient-primary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- Footer -->
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
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<!-- End custom js for this page -->

@endsection
