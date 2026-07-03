<?php

session_start();

include("../config/conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {

    $dados = mysqli_fetch_assoc($resultado);

    if ($senha === $dados['senha']) {

        // Cria as sessões
        $_SESSION['usuario'] = $dados['usuario'];
        $_SESSION['tipo'] = $dados['tipo'];

        // Verifica o tipo de usuário
        if ($dados['tipo'] == "admin") {

            header("Location: ../painel.php");
            exit();

        } else {

            header("Location: ../agendamentos/meus_agendamentos.php");
            exit();

        }

    }

}

// Caso o login falhe
echo "<script>

alert('Usuário ou senha inválidos!');

window.location='login.php';

</script>";

?>