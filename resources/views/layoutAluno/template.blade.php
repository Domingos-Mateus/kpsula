<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Conteúdos</title>
    <link rel="shortcut icon" href="/assets/images/favicon.png" />

    <link rel="stylesheet" href="/assets/capsula/css/style.css">
    <link rel="stylesheet" href="/assets/capsula/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: black;
            margin-top: 70px;
            font-family: 'Montserrat', sans-serif;
        }

        .navbar {
            background-color: black;
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
            color: #fff;
        }

        .banner {
    align-self: center;
    height: 500px;
    width: 100%;
    background: url({{$banner[0]->imagem}}) no-repeat center center;
    background-size: cover;
    border-radius: 10px;
    margin: 20px auto;
}


        .conteudos {
            margin-top: 20px;
            width: 100%;
            height: 100%;
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
            min-width: 200px;
            height: 100%;
            margin: auto;
            border-radius: 0 !important;
        }

        .cursos {
            margin: 0;
            padding: 0;
            width: 100%;
            margin-bottom: 200px;
            overflow-x: hidden;
            overflow-y: hidden;
            display: flex;
            flex-direction: row;
            scroll-behavior: smooth;
        }

        .cursos li {
            margin: 0;
            padding: 0;
            display: inline-block !important;
        }
        .dropdown-menu{
            right: -10px;
        }
    </style>
</head>
<body>
    @yield('conteudo')
    <script src="/assets/capsula/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
