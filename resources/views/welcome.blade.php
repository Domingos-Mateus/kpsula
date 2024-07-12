<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KPSULA</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Figtree, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light text */
            -webkit-font-smoothing: antialiased;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        section {
            margin: 20px 0;
        }

        .crypto-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .crypto-card {
            background-color: #1e1e1e; /* Darker card background */
            border: 1px solid #333; /* Dark border for the card */
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 30%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5); /* Darker shadow for depth */
            transition: transform 0.2s;
        }

        .crypto-card:hover {
            transform: scale(1.05);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin: 10px 0 5px;
            color: #ccc; /* Lighter label color for visibility */
        }

        form input, form textarea, form button {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
            border-radius: 5px;
        }

        form button {
            background-color: #565656; /* Button color */
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Criptomoedas</h1>
        <nav>
            <ul>
                <li><a href="#about">Sobre</a></li>
                <li><a href="#cryptos">Criptomoedas</a></li>
                <li><a href="#contact">Contato</a></li>
                <li><a href="{{ route('login') }}">Log in</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="about">
            <h2>O que são Criptomoedas?</h2>
            <p>Criptomoedas são moedas digitais ou virtuais que utilizam criptografia para segurança. Elas operam de forma descentralizada na tecnologia blockchain.</p>
        </section>
        <section id="cryptos">
            <h2>Principais Criptomoedas</h2>
            <div class="crypto-list">
                <div class="crypto-card" id="bitcoin">
                    <h3>Bitcoin (BTC)</h3>
                    <p>A primeira e mais conhecida criptomoeda.</p>
                </div>
                <div class="crypto-card" id="ethereum">
                    <h3>Ethereum (ETH)</h3>
                    <p>Uma plataforma descentralizada que executa contratos inteligentes.</p>
                </div>
                <div class="crypto-card" id="ripple">
                    <h3>Ripple (XRP)</h3>
                    <p>Um sistema de liquidação bruta em tempo real.</p>
                </div>
            </div>
        </section>
        <section id="contact">
            <h2>Contato</h2>
            <form id="contact-form">
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 KPSULA. Todos os direitos reservados.</p>
    </footer>
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Mensagem enviada! Em breve entraremos em contato.');
        });
    </script>
</body>
</html>
