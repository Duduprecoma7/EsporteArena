<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id='$id'";

$resultado = mysqli_query($conexao, $sql);

$cliente = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Cliente</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

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

        <h2>Editar Cliente</h2>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required>

            <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>

            <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>

            <button type="submit">

                Salvar Alterações

            </button>

        </form>

        <a href="listar.php">

            ← Voltar para Lista

        </a>

    </div>

</body>

</html>