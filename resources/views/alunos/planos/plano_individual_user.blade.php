<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos Existentes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Seu Plano</h4>
                            <div id="userPlan">
                                <!-- Conteúdo dinâmico será inserido aqui -->
                            </div>
                            <a href="/alunos/modulos/listar_modulo_aluno"><button id="cancelButton" class="btn btn-danger mt-3">Cancelar</button></a>
                            <a href="/alunos/planos/editar_plano_usuario/{{ $planoUsuario->id }}">
                                <button id="updateButton" class="btn btn-secondary mt-3" style="display: none;">Atualizar</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Planos Disponíveis</h4>
                            <div id="availablePlans">
                                <!-- Conteúdo dinâmico será inserido aqui -->
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
                Copyright © 2024 <a href="www.devaholic.ao" target="_blank" style="color: #007bff;">DevAholic</a>. Todos os direitos reservados.
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
        if ("{{ $planoUsuario }}") {  // Verifique se o plano do usuário existe
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
                <p class="card-description">Você ainda não possui um plano..</p>
                <a href="/plano_usuario/assinar_plano_usuario" class="btn btn-primary">Assinar um Plano</a>
            `;
        }

        // Preenchendo os dados dos planos disponíveis
        const availablePlansContainer = document.getElementById('availablePlans');
        if (availablePlans.length > 0) {
            let plansHtml = `
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Nome do Plano </th>
                            <th> Preço </th>
                            <th> Data de validade </th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            availablePlans.forEach(plano => {
                plansHtml += `
                    <tr>
                        <td> ${plano_selecionado.nome_plano} </td>
                        <td> R$ ${plano.preco} </td>
                        <td> ${plano.data_expiracao} </td>
                    </tr>
                `;
            });
            plansHtml += `
                    </tbody>
                </table>
            `;
            availablePlansContainer.innerHTML = plansHtml;
        } else {
            availablePlansContainer.innerHTML = `
                <p class="card-description">Não há planos disponíveis no momento.</p>
            `;
        }
    </script>

</body>
</html>
