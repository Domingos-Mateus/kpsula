<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos Existentes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .main-panel {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 20px;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .card {
            background-color: #1e1e1e;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #1e1e1e;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .table {
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Planos Existentes</h3>
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
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Seu Plano</h4>
                            <div id="userPlan">
                                <!-- Conteúdo dinâmico será inserido aqui -->
                            </div>
                            <!--
                            <a href="/alunos/modulos/listar_modulo_aluno"><button id="cancelButton"
                                    class="btn btn-danger mt-3">Cancelar</button>
                                </a>
                            <a href="/alunos/planos/editar_plano_usuario/{{ $planoUsuario->id }}">
                                <button id="updateButton" class="btn btn-secondary mt-3"
                                    style="display: none;">Atualizar</button>
                            </a>
                            -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Atualize o seu plano!</h4>
                            <div id="availablePlans">
                                <form action="/atualizar_plano_usuario_aluno/{{ $planoUsuario->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="container">
                                        <h1>Escolha uma Opção</h1>
                                        <div class="select-container">
                                            <select name="plano_id" class="form-control">
                                                @foreach ($planos as $plano)
                                                    <option value="{{ $plano->id }}"
                                                        @if ($planoUsuario->plano_id == $plano->id) selected @endif>
                                                        {{ $plano->nome_plano }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="btn-container mt-3">
                                            <button type="submit" class="btn btn-plan btn-primary">Actualizar Plano</button>
                                            <a href="/alunos/planos/listar_planos" class="btn btn-cancel btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
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
                Copyright © 2024 <a href="www.devaholic.ao" target="_blank" style="color: #007bff;">DevAholic</a>. Todos
                os direitos reservados.
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Feito com <i class="mdi mdi-heart text-danger"></i>
            </span>
        </div>
    </footer>

    <script>
        // Dados do plano do usuário, simulados para serem dinâmicos
        const userPlan = {
            nome_plano: "{{ $planoUsuario ? $planoUsuario->nome_plano : '' }}",
            preco: "{{ $planoUsuario ? $planoUsuario->preco : '' }}",
            data_expiracao: "{{ $planoUsuario ? $planoUsuario->data_expiracao : '' }}"
        };

        // Dados dos planos disponíveis, simulados para serem dinâmicos
        const availablePlans = @json($planos);

        // Preenchendo os dados do plano do usuário
        const userPlanContainer = document.getElementById('userPlan');
        if ("{{ $planoUsuario }}") { // Verifique se o plano do usuário existe
            userPlanContainer.innerHTML = `
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
                            <td> ${userPlan.nome_plano} </td>
                            <td> R$ ${userPlan.preco} </td>
                            <td> ${userPlan.data_expiracao} </td>
                        </tr>
                    </tbody>
                </table>
            `;

            // Exibir o botão de atualizar se o plano for mensal
            document.getElementById('updateButton').style.display = 'inline-block';
        } else {
            userPlanContainer.innerHTML = `
                <p class="card-description">Você ainda não possui um plano.</p>
                <a href="/plano_usuario/assinar_plano_usuario" class="btn btn-primary">Assinar um Plano</a>
            `;
        }
    </script>

</body>

</html>
