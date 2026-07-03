<?php

include("../config/conexao.php");

$id = $_POST['id'];
$cliente_id = $_POST['cliente_id'];
$quadra_id = $_POST['quadra_id'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$duracao = $_POST['duracao'];
$observacao = $_POST['observacao'];

$sqlVerifica = "SELECT * FROM agendamentos
WHERE quadra_id='$quadra_id'
AND data='$data'
AND hora='$hora'
AND id <> '$id'";

$resultado = mysqli_query($conexao, $sqlVerifica);

if (mysqli_num_rows($resultado) > 0) {

    echo "<script>

    alert('Este horário já está reservado para esta quadra!');

    window.history.back();

    </script>";

    exit();

}

$sql = "UPDATE agendamentos SET

cliente_id='$cliente_id',

quadra_id='$quadra_id',

data='$data',

hora='$hora',

duracao='$duracao',

observacao='$observacao'

WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {

    echo "<script>

    alert('Agendamento atualizado com sucesso!');

    window.location='listar.php';

    </script>";

} else {

    echo "<script>

    alert('Erro ao atualizar o agendamento.');

    window.history.back();

    </script>";

}

?>