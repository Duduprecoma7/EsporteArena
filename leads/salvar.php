<?php

include("../config/conexao.php");

$nome = $_POST['nome'];

$email = $_POST['email'];

$telefone = $_POST['telefone'];

$sql = "INSERT INTO leads(nome,email,telefone)
VALUES('$nome','$email','$telefone')";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Cadastro realizado com sucesso!');

    window.location='../index.php';

    </script>";

} else {

    echo "Erro ao cadastrar.";

}

?>