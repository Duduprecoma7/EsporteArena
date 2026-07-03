<?php
include("../config/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Cliente</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        body {

            background: #eef2f7;

        }

        .container {

            width: 500px;

            margin: 50px auto;

            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .2);

        }

        h2 {

            text-align: center;

            margin-bottom: 25px;

            color: #4f46e5;

        }

        input {

            width: 100%;

            padding: 15px;

            margin-bottom: 20px;

            border: 1px solid #ccc;

            border-radius: 10px;

            font-size: 16px;

        }

        button {

            width: 100%;

            padding: 15px;

            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);

            border: none;

            color: white;

            font-size: 17px;

            border-radius: 10px;

            cursor: pointer;

            transition: .3s;

        }

        button:hover {

            opacity: .9;

        }

        a {

            display: block;

            text-align: center;

            margin-top: 20px;

            text-decoration: none;

            color: #4f46e5;

            font-weight: bold;

        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Cadastro de Cliente</h2>

        <form action="salvar.php" method="POST">

            <input type="text" name="nome" placeholder="Nome Completo" required>

            <input type="text" name="telefone" placeholder="Telefone" required>

            <input type="email" name="email" placeholder="E-mail" required>

            <button type="submit">

                Cadastrar Cliente

            </button>

        </form>

        <a href="../painel.php">

            ← Voltar ao Painel

        </a>

    </div>

</body>

</html>