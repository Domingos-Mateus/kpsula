@extends('layout.template')

@section('conteudo')
    <br><br><br><br><br>
    <!-- Main Panel -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Atualizar Módulo</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/modulos/listar_modulos">Cancelar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Atualizar Módulo</li>
                    </ol>
                </nav>
            </div>

            <!-- Formulário de Atualização de Módulo -->
            <form action="/atualizar_modulo/{{ $modulos->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulário de Atualização de Módulo</h4>
                            <p class="card-description">Atualize as informações do módulo</p>

                            <div class="row">
                                <!-- Nome do Módulo -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nome do Módulo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nome_modulo" value="{{ old('nome_modulo', $modulos->nome_modulo) }}" required />
                                            @error('nome_modulo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Descrição -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Descrição</label>
                                        <div class="col-sm-9">
                                            <textarea name="descricao" class="form-control" rows="4" required>{{ old('descricao', $modulos->descricao) }}</textarea>
                                            @error('descricao')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Carregar Imagem -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Carregar Imagem</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_modulo" name="foto_modulo">
                                                <label class="custom-file-label" for="foto_modulo">Escolher arquivo...</label>
                                            </div>
                                            @error('foto_modulo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            @if($modulos->foto_modulo)
                                                <p>Imagem atual:</p>
                                                <img src="{{ asset($modulos->foto_modulo) }}" alt="Imagem do Módulo" width="150">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botões de Ação -->
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-gradient-primary me-2">Atualizar</button>
                                    <a href="/modulos/listar_modulos" class="btn btn-light">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
