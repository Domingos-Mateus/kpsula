@extends('layout.template')

@section('conteudo')
    <br><br><br><br><br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Adicionar Vídeo</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('modulos.show', $modulo->id) }}">Voltar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adicionar Vídeo</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulário de Adição de Vídeo</h4>
                            <p class="card-description">Adicionar um novo vídeo ao módulo: <strong>{{ $modulo->nome_modulo }}</strong></p>

                            <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Campo Oculto para o ID do Módulo -->
                                <input type="hidden" name="modulo_id" value="{{ $modulo->id }}">

                                <!-- Nome do Vídeo -->
                                <div class="form-group">
                                    <label for="nome_video">Nome do Vídeo</label>
                                    <input type="text" class="form-control" id="nome_video" name="nome_video" value="{{ old('nome_video') }}" required>
                                    @error('nome_video')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Link do Vídeo -->
                                <div class="form-group">
                                    <label for="link_video">Link do Vídeo</label>
                                    <input type="text" class="form-control" id="link_video" name="link_video" value="{{ old('link_video') }}" required>
                                    @error('link_video')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Descrição do Vídeo -->
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="4">{{ old('descricao') }}</textarea>
                                    @error('descricao')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Carregar Imagem -->
                                <div class="form-group">
                                    <label for="imagem">Carregar Imagem</label>
                                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                                    @error('imagem')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Botões de Ação -->
                                <button type="submit" class="btn btn-gradient-primary">Adicionar Vídeo</button>
                                <a href="{{ route('modulos.show', $modulo->id) }}" class="btn btn-light">Cancelar</a>
                            </form>
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
