<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Estilizada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding-top: 60px; /* Espaço para a navbar fixa */
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .navbar .logo {
            font-size: 24px;
            color: #fff;
            text-decoration: none;
        }
        .navbar .search-bar {
            flex-grow: 1;
            margin: 0 20px;
        }
        .navbar .search-bar input {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }
        .navbar .dropdown {
            position: relative;
            display: inline-block;
        }
        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .navbar .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #1e1e1e;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #333;
        }
        tr:nth-child(even) {
            background-color: #2a2a2a;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 5px;
            transition: background-color 0.3s ease;
        }
        .btn-plan {
            background-color: #4CAF50;
            color: white;
        }
        .btn-cancel {
            background-color: #f44336;
            color: white;
        }
        .btn-plan:hover {
            background-color: #45a049;
        }
        .btn-cancel:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#" class="logo">Logo</a>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar...">
        </div>
        <div class="dropdown">
            <span>Plano</span>
            <div class="dropdown-content">
                <a href="#">Plano</a>
                <a href="#">Meu Plano</a>
            </div>
        </div>
        <div class="dropdown">
            <span>Usuário</span>
            <div class="dropdown-content">
                <a href="#">Nome do Usuário</a>
                <a href="#">Ajuda</a>
                <a href="#">Perfil</a>
                <a href="#">Sair</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Tabela Estilizada</h1>
        <div>
            <a href="/alunos/planos/assinar_plano_usuario" class="btn btn-plan">Assinar Plano</a>
            <a href="/aluno_index" class="btn btn-cancel">Cancelar</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Plano</th>
                    <th>Preço</th>
                    <th>Dias</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planos as $plano)
                <tr>
                    <td> {{ $plano->id }} </td>
                    <td> {{ $plano->nome_plano }} </td>
                    <td> {{ $plano->preco }} </td>
                    <td> {{ $plano->dias }} </td>
                    <td> {{ $plano->descricao }} </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>
</html>
