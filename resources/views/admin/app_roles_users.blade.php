@extends('layout.template')

@section('conteudo')


<!-- Toastr CSS -->
<br><br>
<div class="main-panel">



<br><br>
            <div class="card">

                <div class="card-header py-2">

                    <h3 class="card-title">
                        Defina as funções dos usuários
                    </h3>


                </div>

                </div class="card-body">

                <form action="/salvar_roles_users" method="POST" enctype="multipart/form-data">
                      @csrf
                 <div class="table-responsive bg-white">
                        <table class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Usuários</th>
                                    <th>Perfil</th>
                                </tr>

                        </thead>
                        <tbody>
                            @foreach($users as $item)
                        <tr>

                        <td>{{$item->id}}</td>
                        <td>
                        <select class="form-control" name="user_id" disabled>
                            <option value="{{$item->id}}">{{$item->name}}</option>
                       </select>
                        </td>
                        <td>
                       <select class="form-control custom-select" name="role_id" id="select_{{$loop->index}}" data-value="{{$item->id}}">
                        <option value="" selected></option>
                        @foreach ($roles_users as $item_role)
                        <option value="{{$item_role->role_id}}" {{$item->id == $item_role->user_id ? 'selected' : ''}}>{{$item_role->role_id}} - {{$item_role->role_name}}</option>
                        @endforeach
                       </select>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>

                       <div>
                        {{-- <button type="submit" name="Enviar" class="btn btn-primary">Salvar</button> --}}
                        </form>
                </div>
            </div>


<script>
    document.querySelectorAll('.custom-select').forEach(function(select) {
      select.addEventListener('change', function() {
        var id_role = this.value;
        var selectId = this.id;
        var id_user = this.getAttribute('data-value');
        // console.log(id_role);
        // console.log(selectId);
        // console.log(id_user);
        $.ajax({
          type: 'POST',
          url: '/actualizar_roles_users',
          data: { role_id: id_role, user_id: id_user },
          success: function(response) {
            // console.log('Valor atualizado com sucesso: ', response);
            toastr.success("Função do usuário atualizada com sucesso");
          },
          error: function(error) {
            console.error('Erro ao atualizar o valor: ', error);
          }
        });
      });
    });
  </script>

  @endsection
