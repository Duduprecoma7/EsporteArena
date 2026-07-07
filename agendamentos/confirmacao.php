<?php

include("../config/conexao.php");

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT
agendamentos.*,
clientes.nome AS cliente,
clientes.telefone AS telefone,
quadras.nome AS quadra

FROM agendamentos

INNER JOIN clientes
ON clientes.id = agendamentos.cliente_id

INNER JOIN quadras
ON quadras.id = agendamentos.quadra_id

WHERE agendamentos.id='$id'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    die("Agendamento não encontrado.");
}

$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agendamento Concluído</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {

            background: #eef2f7;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

        }

        .card {

            width: 700px;

            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);

        }

        .topo {

            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);

            color: white;

            text-align: center;

            padding: 40px;

        }

        .topo .icone {

            font-size: 75px;

            margin-bottom: 15px;

        }

        .topo h1 {

            font-size: 40px;

            margin-bottom: 10px;

        }

        .topo p {

            font-size: 18px;

        }

        .conteudo {

            padding: 40px;

        }

        .info {

            display: flex;

            justify-content: space-between;

            padding: 18px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 18px;

        }

        .info strong {

            color: #222;

        }

        .info span {

            color: #555;

        }

        .botoes {

            margin-top: 35px;

            display: flex;

            justify-content: center;

            gap: 20px;

        }

        .botao {

            padding: 15px 35px;

            border-radius: 10px;

            text-decoration: none;

            color: white;

            font-weight: bold;

            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);

            transition: .3s;

        }

        .botao:hover {

            transform: translateY(-3px);

            box-shadow: 0 10px 20px rgba(79, 70, 229, .3);

        }
    </style>

</head>

<body>

    <div class="card">

        <div class="topo">

            <div class="icone">

                ✅

            </div>

            <h1>Agendamento Concluído!</h1>

            <p>Sua reserva foi realizada com sucesso.</p>

        </div>

        <div class="conteudo">

            <div class="info">

                <strong>Cliente</strong>

                <span><?php echo $dados['cliente']; ?></span>

            </div>

            <div class="info">

                <strong>Telefone</strong>

                <span><?php echo $dados['telefone']; ?></span>

            </div>

            <div class="info">

                <strong>Quadra</strong>

                <span><?php echo $dados['quadra']; ?></span>

            </div>

            <div class="info">

                <strong>Data</strong>

                <span><?php echo date("d/m/Y", strtotime($dados['data'])); ?></span>

            </div>

            <div class="info">

                <strong>Hora</strong>

                <span><?php echo substr($dados['hora'], 0, 5); ?></span>

            </div>

            <div class="info">

                <strong>Duração</strong>

                <span><?php echo $dados['duracao']; ?> Hora(s)</span>

            </div>

            <div class="info">

                <strong>Observação</strong>

                <span>

                    <?php

                    if ($dados['observacao'] == "") {

                        echo "Nenhuma";

                    } else {

                        echo $dados['observacao'];

                    }

                    ?>

                </span>

            </div>

            <div class="botoes">

                <a href="../index.php" class="botao">

                     Página Inicial

                </a>

                <a href="cadastrar.php" class="botao">

                    Novo Agendamento

                </a>

            </div>

        </div>

    </div>

</body>

</html>