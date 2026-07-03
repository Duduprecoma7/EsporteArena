<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM agendamentos WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Agendamento excluído com sucesso!');

    window.location='listar.php';

    </script>";

} else {

    echo "<script>

    alert('Erro ao excluir o agendamento.');

    window.location='listar.php';

    </script>";

}

?>