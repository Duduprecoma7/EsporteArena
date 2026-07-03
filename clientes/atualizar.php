<?php

include("../config/conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "UPDATE clientes SET
nome='$nome',
telefone='$telefone',
email='$email'
WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Cliente atualizado com sucesso!');

    window.location='listar.php';

    </script>";

} else {

    echo "Erro ao atualizar cliente.";

}

?>