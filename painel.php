<?php
session_start();
include("config/conexao.php");

// Se quiser proteger o painel, descomente abaixo quando o login estiver pronto.

if (!isset($_SESSION['usuario'])) {
    header("Location: login/login.php");
    exit();
}

// Contadores
$clientes = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM clientes"));
$leads = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM leads"));
$quadras = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM quadras"));
$agendamentos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM agendamentos"));

// Buscar todos os agendamentos

$sqlAgendamentos = "SELECT

agendamentos.id,

clientes.nome AS cliente,

quadras.nome AS quadra,

agendamentos.data,

agendamentos.hora,

agendamentos.duracao

FROM agendamentos

INNER JOIN clientes
ON clientes.id = agendamentos.cliente_id

INNER JOIN quadras
ON quadras.id = agendamentos.quadra_id

ORDER BY agendamentos.data ASC,
agendamentos.hora ASC";

$resultAgendamentos = mysqli_query($conexao, $sqlAgendamentos);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Segoe UI, Arial, sans-serif;
        }

        body {

            display: flex;

            background: #edf2f7;

        }

        /* MENU */

        .sidebar {

            width: 250px;

            height: 100vh;

            background: linear-gradient(180deg, #2563eb, #4f46e5, #7c3aed);

            position: fixed;

            left: 0;

            top: 0;

            padding-top: 30px;

        }

        .sidebar h2 {

            color: white;

            text-align: center;

            margin-bottom: 40px;

        }

        .sidebar ul {

            list-style: none;

        }

        .sidebar ul li {

            margin: 10px 20px;

        }

        .sidebar ul li a {

            display: block;

            padding: 15px;

            color: white;

            text-decoration: none;

            border-radius: 10px;

            transition: .3s;

            font-size: 17px;

        }

        .sidebar ul li a:hover {

            background: rgba(255, 255, 255, .2);

        }

        /* CONTEÚDO */

        .main {

            margin-left: 250px;

            padding: 40px;

            width: 100%;

        }

        .main h1 {

            margin-bottom: 30px;

            color: #333;

        }

        /* CARDS */

        .cards {

            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

            gap: 25px;

        }

        .card {

            background: white;

            padding: 30px;

            border-radius: 18px;

            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);

            transition: .3s;

        }

        .card:hover {

            transform: translateY(-5px);

        }

        .card h3 {

            color: #555;

            margin-bottom: 15px;

        }

        .card h1 {

            font-size: 45px;

            color: #4f46e5;

        }

        table {

            width: 100%;

            margin-top: 25px;

            border-collapse: collapse;

            background: white;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);

            border-radius: 10px;

            overflow: hidden;

        }

        table th {

            background: #4f46e5;

            color: white;

            padding: 15px;

        }

        table td {

            padding: 15px;

            text-align: center;

            border-bottom: 1px solid #ddd;

        }

        table tr:hover {

            background: #f8f8f8;

        }

        table a {

            text-decoration: none;

            font-weight: bold;

            color: #2563eb;

        }
    </style>

</head>

<body>

    <div class="sidebar">

        <h2>Arena Sports</h2>

        <ul>

            <li><a href="painel.php"> Dashboard</a></li>

            <li><a href="clientes/listar.php"> Clientes</a></li>

            <li><a href="login/logout.php"> Sair</a></li>

        </ul>

    </div>
    <div class="main">

        <h1>Dashboard</h1>

        <div class="cards">

            <div class="card">

                <h3> Clientes</h3>

                <h1><?php echo $clientes; ?></h1>

            </div>

            <div class="card">

                <h3> Leads</h3>

                <h1><?php echo $leads; ?></h1>

            </div>

            <div class="card">

                <h3> Quadras</h3>

                <h1><?php echo $quadras; ?></h1>

            </div>

            <div class="card">

                <h3> Agendamentos</h3>

                <h1><?php echo $agendamentos; ?></h1>

            </div>

        </div>

        <br><br>

        <h2>Agendamentos</h2>

        <table>

            <tr>

                <th>Cliente</th>

                <th>Quadra</th>

                <th>Data</th>

                <th>Hora</th>

                <th>Duração</th>

                <th>Ações</th>

            </tr>

            <?php

            while ($agendamento = mysqli_fetch_assoc($resultAgendamentos)) {

                ?>

                <tr>

                    <td><?php echo $agendamento['cliente']; ?></td>

                    <td><?php echo $agendamento['quadra']; ?></td>

                    <td><?php echo date("d/m/Y", strtotime($agendamento['data'])); ?></td>

                    <td><?php echo substr($agendamento['hora'], 0, 5); ?></td>

                    <td><?php echo $agendamento['duracao']; ?>h</td>

                    <td>

                        <a href="agendamentos/editar.php?id=<?php echo $agendamento['id']; ?>">

                            Editar

                        </a>

                        |

                        <a onclick="return confirm('Deseja excluir este agendamento?')"
                            href="agendamentos/excluir.php?id=<?php echo $agendamento['id']; ?>">

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