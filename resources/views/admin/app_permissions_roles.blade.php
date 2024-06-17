@extends('layout.template')

@section('conteudo')


<div class="main-panel">

<br><br>

<div class="card">

  <div class="card-header py-2">

    <h3 class="card-title">
      Defina as permissões para as determinadas funções
    </h3>


  </div>

</div class="card-body">

<form action="/salvar_permissions_roles" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="table-responsive bg-white">

    <table class="table table-striped table-bordered">

      <thead>
        <tr>
          <th>Perfil {{$role_id}}</th>
        </tr>
      </thead>

      <tbody>
        <td>
          <select class="form-control" id="select_role" name="role_id">
            @foreach($roles as $item)
            <option value="{{$item->id}}" {{$item->id == $role_id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
          </select>
        </td>
      </tbody>
    </table>


  </div>
<br><br>

<table class="table">
  <thead>
  <tr>
            <th scope="col">Premissões</th>
            <th scope="col">Visualização </th>
            <th scope="col">Inclusão </th>
            <th scope="col">Edição </th>
            <th scope="col">Exclusão </th>
        </tr>
  </thead>
  <tbody>

  <tr>
            <th scope="col">Seleções Coletivas</th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="visualizacao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="inclusao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="edicao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="exclusao"></th>
        </tr>

    <tr>
        <th scope="row">Planos</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_plano", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_plano"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_plano", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_plano"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_plano", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_plano"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_plano", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_plano"></td>
    </tr>

    <tr>
        <th scope="row">Alunos</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_aluno", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_aluno"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_aluno", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_aluno"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_aluno", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_aluno"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_aluno", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_aluno"></td>
    </tr>
    <tr>
        <th scope="row">Planos do Usuario</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_plano_usuario", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_plano_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_plano_usuario", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_plano_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_plano_usuario", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_plano_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_plano_usuario", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_plano_usuario"></td>
    </tr>

    <tr>
        <th scope="row">Modulos</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_modulo", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_modulo"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_modulo", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_modulo"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_modulo", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_modulo"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_modulo", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_modulo"></td>
    </tr>

    <tr>
        <th scope="row">Videos</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_video", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_video"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_video", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_video"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_video", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_video"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_video", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_video"></td>
    </tr>



    <tr>
        <th scope="row">Permissões</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_permissao", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_permissao"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_permissao", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_permissao"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_permissao", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_permissao"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_permissao", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_permissao"></td>
    </tr>
    <tr>
        <th scope="row">Usuários</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_usuario", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_usuario", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_usuario", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_usuario"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_usuario", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_usuario"></td>
    </tr>

  </tbody>
</table>

<center> <button type="submit" name="Enviar" class="btn btn-primary">Salvar</button> </center>

</form>

</div>
<script>
    document.querySelector('#select_role').addEventListener('change', function() {
      let value = this.value;
      // use o método fetch para enviar a requisição
      window.location.href = "/permissions_roles_by_id/" + value;
    });
</script>


<script>
    // Adicione event listeners para os checkboxes de marcar/desmarcar colunas
    const checkAllCheckboxes = document.querySelectorAll('.checkAll');
    checkAllCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const column = this.getAttribute('data-column');
            const checkboxes = document.querySelectorAll(`input[name="${column}[]"]`);
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });
    });
</script>

@endsection
