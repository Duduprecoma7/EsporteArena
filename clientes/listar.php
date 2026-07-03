<?php

include("../config/conexao.php");

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clientes</title>

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

            width: 90%;

            margin: 40px auto;

        }

        h1 {

            text-align: center;

            margin-bottom: 30px;

            color: #4f46e5;

        }

        .topo {

            display: flex;

            justify-content: space-between;

            margin-bottom: 20px;

        }

        .botao {

            background: #4f46e5;

            color: white;

            padding: 12px 20px;

            text-decoration: none;

            border-radius: 8px;

            transition: .3s;

        }

        .botao:hover {

            background: #372aac;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            background: white;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);

        }

        th {

            background: #4f46e5;

            color: white;

            padding: 15px;

        }

        td {

            padding: 15px;

            text-align: center;

            border-bottom: 1px solid #ddd;

        }

        .editar {

            background: #2196F3;

            color: white;

            padding: 8px 15px;

            text-decoration: none;

            border-radius: 6px;

        }

        .excluir {

            background: #e53935;

            color: white;

            padding: 8px 15px;

            text-decoration: none;

            border-radius: 6px;

        }

        tr:hover {

            background: #f7f7f7;

        }
    </style>

</head>

<body>

    <div class="container">

        <h1>Clientes Cadastrados</h1>

        <div class="topo">

            <a class="botao" href="cadastrar.php">

                + Novo Cliente

            </a>

            <a class="botao" href="../painel.php">

                ← Painel

            </a>

        </div>

        <table>

            <tr>

                <th>ID</th>

                <th>Nome</th>

                <th>Telefone</th>

                <th>Email</th>

                <th>Ações</th>

            </tr>

            <?php

            while ($cliente = mysqli_fetch_assoc($resultado)) {

                ?>

                <tr>

                    <td><?php echo $cliente['id']; ?></td>

                    <td><?php echo $cliente['nome']; ?></td>

                    <td><?php echo $cliente['telefone']; ?></td>

                    <td><?php echo $cliente['email']; ?></td>

                    <td>

                        <a class="editar" href="editar.php?id=<?php echo $cliente['id']; ?>">

                            Editar

                        </a>

                        <a class="excluir" href="excluir.php?id=<?php echo $cliente['id']; ?>"
                            onclick="return confirm('Deseja realmente excluir este cliente?');">

                            Excluir

                        </a>

                    </td>

                </tr>

                <?php

            }

            ?>

        </table>

    </div>

</body>

</html>