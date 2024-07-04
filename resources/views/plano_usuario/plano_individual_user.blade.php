@extends('layout.template')

@section('conteudo')
<br><br><br><br><br>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Planos Existentes </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <!--
            <a href="/assinar_plano_usuario">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <i class="fa fa-plus">Adicionar um plano para Usuario</i>
              </div>
            </a>
            -->
          </li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Seu Plano</h4>
            @if($planoUsuario)
              <p class="card-description">Detalhes do plano atual:</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> Nome do Plano </th>
                    <th> Preço </th>
                    <th> Data de validade </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> {{ $planoUsuario->nome_plano }} </td>
                    <td> {{ $planoUsuario->preco }} </td>
                    <td> {{ $planoUsuario->data_expiracao }} </td>
                  </tr>
                </tbody>
              </table>
            @else
              <p class="card-description">Você ainda não possui um plano...</p>
              <a href="/plano_usuario/assinar_plano_usuario" class="btn btn-primary">Assinar um Plano</a>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Planos Disponíveis</h4>
            @if(count($planos) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> Nome do Plano </th>
                    <th> Preço </th>
                    <th> Data de validade </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($planos as $plano)
                    <tr>
                      <td> {{$plano->nome_plano}} </td>
                      <td> {{$plano->preco}} </td>
                      <td> {{$plano->data_expiracao}} </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <p class="card-description">Não há planos disponíveis no momento.</p>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
        Copyright © 2024 <a href="www.devaholic.ao" target="_blank">DevAholic</a>. Todos os direitos reservados.
      </span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
        Feito com <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>
@endsection
