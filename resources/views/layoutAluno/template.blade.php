<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Conteúdos</title>
    <link rel="stylesheet" href="/assets/capsula/css/style.css">
    <link rel="stylesheet" href="/assets/capsula/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: black;
            margin-top: 70px;
            /* Adicionado para dar espaço para a navbar fixa */
        }

        .navbar {
            background-color: #444;
            border-bottom: 1px solid #555;
        }

        .navbar .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar .navbar-nav {
            margin-left: auto;
        }

        .navbar .form-control {
            width: 200px;
            /* Reduzido o tamanho do campo de pesquisa */
        }

        .banner {
            height: 250px; /* Banner centralizado */
            background: url('/assets/capsula/img/v.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 10px;
            margin: 20px auto;
        }

        .conteudos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .conteudos .card {
            background-color: #222;
            border: none;
            color: #fff;
            width: 200px;
            height: 320px;
            margin: 10px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }




        .conteudos .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            width: 200px;
            height: 320px;
            object-fit: cover;
            margin: auto;
        }
    </style>
</head>

<body>

    @yield('conteudo')

    <script src="/assets/capsula/bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>

    </style>

</body>

</html>
