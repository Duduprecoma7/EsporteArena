<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Cliente excluído com sucesso!');

    window.location='listar.php';

    </script>";

} else {

    echo "Erro ao excluir cliente.";

}

?>