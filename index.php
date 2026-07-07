<?php
include("config/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arena Sports</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <header>
        <div class="logo">
            Arena Sports
        </div>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#quadras">Quadras</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="agendamentos/cadastrar.php">Agendar</a></li>
                <li><a href="login/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <h1>Reserve sua Quadra em Minutos</h1>

        <p>
            Agende sua Quadra de Areia ou Campo Society de forma rápida,
            segura e totalmente online.
        </p>

        <a href="agendamentos/cadastrar.php" class="botao">
            Agendar Agora
        </a>
    </section>

    <section id="quadras">

        <h2 class="titulo">Nossas Quadras</h2>

        <div class="quadras">

            <div class="card">

                <img src="./assets/imagens/campodeareia.png" alt="Quadra de Areia">

                <div class="card-info">

                    <div class="icone">🏖️</div>

                    <div>
                        <h3>Quadra de Areia</h3>

                        <p>
                            Ideal para Beach Tennis, Futevôlei e Vôlei de Areia.
                            Ambiente amplo, iluminado e perfeito para reunir amigos.
                        </p>
                    </div>

                </div>

            </div>

            <div class="card">

                <img src="./assets/imagens/campo_society.png" alt="Campo Society">

                <div class="card-info">

                    <div class="icone">⚽</div>

                    <div>
                        <h3>Campo Society</h3>

                        <p>
                            Campo Society com grama sintética, iluminação em LED,
                            redes de proteção e vestiários completos.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="leads">

        <div class="lead-box">

            <h2>🎁 Receba Promoções Exclusivas</h2>

            <p>
                Cadastre-se para receber descontos, novidades e horários promocionais.
            </p>

            <form action="leads/salvar.php" method="POST">

                <input type="text" name="nome" placeholder="Seu nome" required>

                <input type="email" name="email" placeholder="Seu melhor e-mail" required>

                <input type="text" name="telefone" placeholder="Telefone" required>

                <button type="submit">
                    Quero Receber Promoções
                </button>

            </form>

        </div>

    </section>

    <section id="contato" class="contato">

        <h2>Entre em Contato</h2>

        <p>📱 WhatsApp: (41) 99999-9999</p>
        <p>📧 contato@arenasports.com</p>
        <p>📍 Rua Exemplo, 123 - Curitiba/PR</p>
        <p>📷 Instagram: @arenasports</p>

    </section>

    <footer>
        <p>© 2026 Arena Sports - Todos os direitos reservados.</p>
    </footer>

</body>

</html>