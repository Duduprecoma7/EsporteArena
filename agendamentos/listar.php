<?php

include("../config/conexao.php");

$sql = "SELECT
agendamentos.id,
clientes.nome AS cliente,
quadras.nome AS quadra,
agendamentos.data,
agendamentos.hora,
agendamentos.duracao,
agendamentos.observacao

FROM agendamentos

INNER JOIN clientes
ON clientes.id = agendamentos.cliente_id

INNER JOIN quadras
ON quadras.id = agendamentos.quadra_id

ORDER BY agendamentos.data ASC,
agendamentos.hora ASC";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Agendamentos</title>

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

            width: 95%;

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

        }

        .botao:hover {

            background: #372aac;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            background: white;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .15);

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

        tr:hover {

            background: #f8f8f8;

        }

        .editar {

            background: #2196F3;

            color: white;

            padding: 8px 15px;

            border-radius: 6px;

            text-decoration: none;

        }

        .excluir {

            background: #e53935;

            color: white;

            padding: 8px 15px;

            border-radius: 6px;

            text-decoration: none;

        }
    </style>

</head>

<body>

    <div class="container">

        <h1>Agendamentos</h1>

        <div class="topo">

            <a class="botao" href="cadastrar.php">

                + Novo Agendamento

            </a>

            <a class="botao" href="../painel.php">

                ← Painel

            </a>

        </div>

        <table>

            <tr>

                <th>ID</th>

                <th>Cliente</th>

                <th>Quadra</th>

                <th>Data</th>

                <th>Hora</th>

                <th>Duração</th>

                <th>Observação</th>

                <th>Ações</th>

            </tr>

            <?php

            while ($agendamento = mysqli_fetch_assoc($resultado)) {

                ?>

                <tr>

                    <td><?php echo $agendamento['id']; ?></td>

                    <td><?php echo $agendamento['cliente']; ?></td>

                    <td><?php echo $agendamento['quadra']; ?></td>

                    <td><?php echo date("d/m/Y", strtotime($agendamento['data'])); ?></td>

                    <td><?php echo substr($agendamento['hora'], 0, 5); ?></td>

                    <td><?php echo $agendamento['duracao']; ?> hora(s)</td>

                    <td><?php echo $agendamento['observacao']; ?></td>

                    <td>

                        <a class="editar" href="editar.php?id=<?php echo $agendamento['id']; ?>">

                            Editar

                        </a>

                        <a class="excluir" href="excluir.php?id=<?php echo $agendamento['id']; ?>"
                            onclick="return confirm('Deseja excluir este agendamento?')">

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