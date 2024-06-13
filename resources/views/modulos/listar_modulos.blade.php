@extends('layout.template')

@section('conteudo')


        <br><br><br><br><br>
        <!-- partial -->

          <!-- Menu -->
          <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Vídeos </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/modulos/registar_modulo">Adicionar módulo</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Nome do Módulo </th>
                          <th> Descrição </th>
                          <th> Opções </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($modulos as $modulo)

                        <tr>
                            <td> {{$modulo->id}} </td>
                            <td> {{$modulo->nome_modulo}} </td>
                            <td> {{$modulo->descricao}} </td>
                            <td>

                                <td>

                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a class="bg-primary p-2 rounded-circle" href="/modulos/editar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-pencil"></i></a>
                                    <a class="bg-warning mx-2 p-2 rounded-circle" href="/modulos/visualizar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-eye"></i></a>
                                    <a class="bg-danger p-2 rounded-circle" href="/eliminar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-trash-o"></i></a>

                                    </div>
                            </div>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>




            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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
