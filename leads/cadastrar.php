<?php
include("../config/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de Lead</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

    <h2>Receba nossas promoções</h2>

    <form action="salvar.php" method="POST">

        <input type="text" name="nome" placeholder="Nome" required>

        <br><br>

        <input type="email" name="email" placeholder="Email" required>

        <br><br>

        <input type="text" name="telefone" placeholder="Telefone" required>

        <br><br>

        <button type="submit">

            Cadastrar

        </button>

    </form>

</body>

</html>