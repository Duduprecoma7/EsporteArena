<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM agendamentos WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql);
$agendamento = mysqli_fetch_assoc($resultado);

$sqlClientes = "SELECT * FROM clientes ORDER BY nome";
$resultClientes = mysqli_query($conexao, $sqlClientes);

$sqlQuadras = "SELECT * FROM quadras ORDER BY nome";
$resultQuadras = mysqli_query($conexao, $sqlQuadras);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Agendamento</title>

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

            width: 600px;

            margin: 40px auto;

            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .15);

        }

        h2 {

            text-align: center;

            margin-bottom: 25px;

            color: #4f46e5;

        }

        label {

            display: block;

            margin-top: 15px;

            margin-bottom: 8px;

            font-weight: bold;

        }

        select,
        input,
        textarea {

            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 8px;

            font-size: 15px;

        }

        textarea {

            resize: none;

            height: 90px;

        }

        button {

            margin-top: 25px;

            width: 100%;

            padding: 15px;

            border: none;

            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);

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

            margin-top: 20px;

            text-align: center;

            text-decoration: none;

            font-weight: bold;

            color: #4f46e5;

        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Editar Agendamento</h2>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $agendamento['id']; ?>">

            <label>Cliente</label>

            <select name="cliente_id" required>

                <?php

                while ($cliente = mysqli_fetch_assoc($resultClientes)) {

                    $selected = ($cliente['id'] == $agendamento['cliente_id']) ? "selected" : "";

                    echo "<option value='" . $cliente['id'] . "' $selected>" . $cliente['nome'] . "</option>";

                }

                ?>

            </select>

            <label>Quadra</label>

            <select name="quadra_id" required>

                <?php

                while ($quadra = mysqli_fetch_assoc($resultQuadras)) {

                    $selected = ($quadra['id'] == $agendamento['quadra_id']) ? "selected" : "";

                    echo "<option value='" . $quadra['id'] . "' $selected>" . $quadra['nome'] . "</option>";

                }

                ?>

            </select>

            <label>Data</label>

            <input type="date" name="data" value="<?php echo $agendamento['data']; ?>" required>

            <label>Hora</label>

            <input type="time" name="hora" value="<?php echo substr($agendamento['hora'], 0, 5); ?>" required>

            <label>Duração (Horas)</label>

            <input type="number" name="duracao" min="1" max="8" value="<?php echo $agendamento['duracao']; ?>" required>

            <label>Observação</label>

            <textarea name="observacao"><?php echo $agendamento['observacao']; ?></textarea>

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