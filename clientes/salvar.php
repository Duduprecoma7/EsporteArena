<?php

include("../config/conexao.php");

$nome = $_POST["nome"];

$telefone = $_POST["telefone"];

$email = $_POST["email"];

$sql = "INSERT INTO clientes(nome,telefone,email)

VALUES('$nome','$telefone','$email')";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

alert('Cliente cadastrado com sucesso!');

window.location='listar.php';

</script>";

} else {

    echo "Erro ao cadastrar.";

}

?>