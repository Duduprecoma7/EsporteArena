<?php

include("../config/conexao.php");

$sql = "SELECT * FROM leads";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Lista de Leads</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

    <h2>Leads Cadastrados</h2>

    <table border="1" cellpadding="10">

        <tr>

            <th>ID</th>

            <th>Nome</th>

            <th>Email</th>

            <th>Telefone</th>

            <th>Data</th>

        </tr>

        <?php

        while ($lead = mysqli_fetch_assoc($resultado)) {

            ?>

            <tr>

                <td>
                    <?php echo $lead['id']; ?>
                </td>

                <td>
                    <?php echo $lead['nome']; ?>
                </td>

                <td>
                    <?php echo $lead['email']; ?>
                </td>

                <td>
                    <?php echo $lead['telefone']; ?>
                </td>

                <td>
                    <?php echo $lead['data_cadastro']; ?>
                </td>

            </tr>

            <?php

        }

        ?>

    </table>

</body>

</html>