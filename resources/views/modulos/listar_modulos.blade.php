@extends('layout.template')

@section('conteudo')
<br><br><br><br><br>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Módulos </h3>
      <nav aria-label="breadcrumb">
        @can('pode_registrar_modulo')
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/modulos/registar_modulo">Adicionar módulo</a></li>
        </ol>
        @endcan
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pesquisar Módulos</h4>
            <form id="search-form">
              <div class="form-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar por nome ou descrição" value="{{ request('search') }}">
              </div>
            </form>
            <br>
            <h4 class="card-title">Módulos</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nome do Módulo </th>
                  <th> Descrição </th>
                  <th> Opções </th>
                </tr>
              </thead>
              <tbody id="modulos-tbody">
                @foreach ($modulos as $modulo)
                <tr>
                  <td class="py-1">
                    <img src="{{ $modulo->foto_modulo }}" alt="image" />
                  </td>
                  <td> {{ $modulo->nome_modulo }} </td>
                  <td> {{ $modulo->descricao }} </td>
                  <td>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        @can('pode_editar_modulo')<a class="bg-primary p-2 rounded-circle" href="/modulos/editar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-pencil"></i></a>@endcan
                      <a class="bg-warning mx-2 p-2 rounded-circle" href="/modulos/visualizar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-eye"></i></a>
                      @can('pode_eliminar_modulo')<a class="bg-danger p-2 rounded-circle" href="/eliminar_modulo/{{ $modulo->id }}"><i style="font-size: 18px; color:black" class="fa fa-trash-o"></i></a>@endcan
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- Links de paginação -->
            {{ $modulos->links() }}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      var query = $(this).val();
      $.ajax({
        url: "{{ route('modulos.index') }}",
        type: "GET",
        data: { 'search': query },
        success: function(data) {
          $('#modulos-tbody').html('');
          $.each(data.data, function(key, modulo) { // Use data.data for paginated results
            $('#modulos-tbody').append(`
              <tr>
                <td class="py-1">
                  <img src="${modulo.foto_modulo}" alt="image" />
                </td>
                <td>${modulo.nome_modulo}</td>
                <td>${modulo.descricao}</td>
                <td>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <a class="bg-primary p-2 rounded-circle" href="/modulos/editar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-pencil"></i></a>
                    <a class="bg-warning mx-2 p-2 rounded-circle" href="/modulos/visualizar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-eye"></i></a>
                    <a class="bg-danger p-2 rounded-circle" href="/eliminar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-trash-o"></i></a>
                  </div>
                </td>
              </tr>
            `);
          });

          // Handle pagination links
          $('.pagination').html('');
          $.each(data.links, function(key, link) {
            if (key > 0 && key < data.links.length - 1) {
              $('.pagination').append(`<li class="page-item ${link.active ? 'active' : ''}"><a class="page-link" href="${link.url}">${link.label}</a></li>`);
            }
          });
        }
      });
    });

    // Handle pagination click
    $(document).on('click', '.pagination a', function(e) {
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
    });

    function fetch_data(page) {
      $.ajax({
        url: "{{ route('modulos.index') }}?page=" + page,
        success: function(data) {
          $('#modulos-tbody').html('');
          $.each(data.data, function(key, modulo) {
            $('#modulos-tbody').append(`
              <tr>
                <td class="py-1">
                  <img src="${modulo.foto_modulo}" alt="image" />
                </td>
                <td>${modulo.nome_modulo}</td>
                <td>${modulo.descricao}</td>
                <td>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <a class="bg-primary p-2 rounded-circle" href="/modulos/editar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-pencil"></i></a>
                    <a class="bg-warning mx-2 p-2 rounded-circle" href="/modulos/visualizar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-eye"></i></a>
                    <a class="bg-danger p-2 rounded-circle" href="/eliminar_modulo/${modulo.id}"><i style="font-size: 18px; color:black" class="fa fa-trash-o"></i></a>
                  </div>
                </td>
              </tr>
            `);
          });

          // Handle pagination links
          $('.pagination').html('');
          $.each(data.links, function(key, link) {
            if (key > 0 && key < data.links.length - 1) {
              $('.pagination').append(`<li class="page-item ${link.active ? 'active' : ''}"><a class="page-link" href="${link.url}">${link.label}</a></li>`);
            }
          });
        }
      });
    }
  });
</script>
@endsection
