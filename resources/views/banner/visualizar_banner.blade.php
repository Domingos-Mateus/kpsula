@extends('layout.template')

@section('conteudo')
<br><br><br><br><br>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Banner</h3>
      <nav aria-label="breadcrumb">
        @can('pode_registrar_modulo')
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/listar_banner">voltar</a></li>
        </ol>
        @endcan
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <br>
            <h4 class="card-title">Banner</h4>
            <table class="table table-striped">
              <thead>
                <tr>

                  <th> Ver completo </th>
                </tr>
              </thead>
              <tbody id="modulos-tbody">
                <!-- Supondo que seja uma lista de banners -->
                <tr>
                    <img src="{{ $banner->imagem }}" alt="Banner image" style="width: 100%;  height: auto;">

                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="www.devaholic.ao" target="_blank">DevAholic</a>. Todos os direitos reservados.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito com <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
</div>
@endsection
