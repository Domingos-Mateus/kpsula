<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção e Ações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #ffffff;
            margin: 0;
            padding-top: 60px;
            /* Espaço para a navbar fixa */
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #000000;
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

        .navbar .menu {
            display: flex;
            gap: 20px;
        }

        .navbar .menu a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            transition: background-color 0.3s ease;
        }

        .navbar .menu a:hover {
            background-color: #000000;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 60px);
            /* Altura da tela menos a navbar */
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            margin-bottom: 20px;
        }

        .select-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #0e9ba5;
            color: white;
            appearance: none;
            outline: none;
            cursor: pointer;
            width: 200px;
            transition: background-color 0.3s ease;
        }

        select:hover {
            background-color: #0e9ba5;
        }

        .select-container::after {
            content: '▼';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #ffffff;
        }

        .btn-container {
            display: flex;
            gap: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn-plan {
            background-color: #0e9ba5;
        }

        .btn-cancel {
            background-color: #f44336;
        }

        .btn-plan:hover {
            background-color: #0e9ba5;
        }

        .btn-cancel:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="#" class="logo">Logo</a>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
        </div>
    </div>

    <form action="/atualizar_plano_usuario_aluno/{{ $plano_user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <h1>Escolha uma Opção</h1>
            <div class="select-container">
                <select name="plano_id">
                    @foreach ($planos as $plano)
                        <option value="{{ $plano->id }}" @if($plano_user->plano_id == $plano->id) selected @endif>{{$plano->nome_plano}}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-plan">Actualizar Plano</button>
                <a href="/alunos/planos/listar_planos" class="btn btn-cancel">Cancelar</a>
            </div>
        </div>
    </form>
</body>

</html>
