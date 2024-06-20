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
              <h3 class="page-title"> Escolhe seu plano </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/planos/listar_planos">Cancelar</a></li>
                </ol>
              </nav>
            </div>

            <!-- Formulário de Adição de Plano -->
            <form action="/salvar_plano_usuario" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Assine um plano</h4>

                        <p class="card-description"> Informações Pessoais </p>

                        <!-- Nome do Plano -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleFormControlSelect2">Seleciona um Plano</label>
                                <select name="plano_id" class="form-select" id="exampleFormControlSelect2">
                                    @foreach ($planos as $plano)
                                  <option value="{{$plano->id}}">{{$plano->nome_plano}}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>

                        <!-- Botões -->
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-gradient-primary me-2">Assinar</button>
                            <a href="/plano_usuario/listar_plano_usuario" class="btn btn-light">Cancelar</a>
                          </div>
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
