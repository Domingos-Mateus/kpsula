@extends('layout.template')

@section('conteudo')
    <br><br><br><br><br>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Logo </h3>
      <nav aria-label="breadcrumb">
        @can('pode_registrar_modulo')
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/cadastrar_logo">Mudar a Logo</a></li>
        </ol>
        @endcan
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <br>
            <h4 class="card-title">Logo</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Imagem </th>
                  <th> Ver completo </th>

                </tr>
              </thead>
              <tbody id="modulos-tbody">
                @foreach ($logos as $logo)
                <tr>
                    <td> {{ $logo->id }} </td>
                  <td class="py-1">
                    <img src="{{ $logo->imagem }}" alt="image" />
                  </td>

                  <td>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                      <a class="bg-warning mx-2 p-2 rounded-circle" href="/logo/visualizar_logo/{{$logo->id}}"><i style="font-size: 18px; color:black" class="fa fa-eye"></i></a>
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
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="www.devaholic.ao" target="_blank">DevAholic</a>. Todos os direitos reservados.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito com <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
</div>

@endsection
