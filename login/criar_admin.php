<?php

include("config/conexao.php");

$usuario = "admin";

$senha = password_hash("1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(usuario, senha)
VALUES('$usuario','$senha')";

if (mysqli_query($conexao, $sql)) {

    echo "Administrador criado com sucesso.";

} else {

    echo "Erro ao criar administrador.";

}

?>