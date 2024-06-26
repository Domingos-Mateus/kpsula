@extends('layout.template')

@section('conteudo')
   <!-- partial -->
      <!-- Menu -->
      <br><br><br><br><br>
      <!-- partial -->
      <!-- Menu -->
        <!-- partial:partials/_sidebar.html -->

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Adicionar um Módulo</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/modulos/listar_modulos">Cancelar</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Adicionar um Módulo</li>
                </ol>
              </nav>
            </div>

            <!-- Formulário de Adição de Módulo -->
            <form action="/salvar_modulo" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Formulário de Adição de Módulo</h4>
                      <p class="card-description"> Insira as informações do módulo </p>

                      <!-- Nome do Módulo e Descrição -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nome do Módulo</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nome_modulo" placeholder="Inserir o nome do Módulo" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descrição</label>
                            <div class="col-sm-9">
                                <textarea name="descricao" class="form-control" rows="4" placeholder="Descrição do Módulo" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Carregar Imagem</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_modulo" name="foto_modulo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Selecionar Plano -->
                    <div class="form-group">
                        <label for="plano_id">Plano</label>
                        <select class="form-control" id="plano_id" name="plano_id" required>
                            <option value="" disabled selected>Selecione um Plano</option>
                            @foreach($planos as $plano)
                                <option value="{{ $plano->id }}">{{ $plano->nome_plano }}</option>
                            @endforeach
                        </select>
                        @error('plano_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                      <!-- Botão de Submissão -->
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-gradient-primary me-2">Registrar</button>
                          <a href="/modulos/listar_modulos" class="btn btn-light">Cancelar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
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
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/jquery.cookie.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page -->

@endsection
