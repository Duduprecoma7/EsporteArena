<?php

include("../config/conexao.php");

$cliente_id = $_POST['cliente_id'];
$quadra_id = $_POST['quadra_id'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$duracao = $_POST['duracao'];
$observacao = $_POST['observacao'];

$sqlVerifica = "SELECT * FROM agendamentos
WHERE quadra_id='$quadra_id'
AND data='$data'
AND hora='$hora'";

$resultado = mysqli_query($conexao, $sqlVerifica);

if (mysqli_num_rows($resultado) > 0) {

    echo "<script>

    alert('Este horário já está reservado para esta quadra!');

    window.history.back();

    </script>";

    exit();

}

// Salvar agendamento
$sql = "INSERT INTO agendamentos
(cliente_id, quadra_id, data, hora, duracao, observacao)

VALUES

('$cliente_id',
'$quadra_id',
'$data',
'$hora',
'$duracao',
'$observacao')";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Agendamento realizado com sucesso!');

    window.location='listar.php';

    </script>";

} else {

    echo "<script>

    alert('Erro ao realizar agendamento.');

    window.history.back();

    </script>";

}

?>