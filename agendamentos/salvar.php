<?php

include("../config/conexao.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: cadastrar.php");
    exit();
}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$quadra_id = $_POST['quadra_id'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$duracao = $_POST['duracao'];
$observacao = $_POST['observacao'];

// Verificar se já existe agendamento na mesma quadra, data e hora
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

// Primeiro cadastra o cliente
$sqlCliente = "INSERT INTO clientes (nome, telefone, email)
VALUES ('$nome', '$telefone', '')";

if (mysqli_query($conexao, $sqlCliente)) {

    $cliente_id = mysqli_insert_id($conexao);

    // Depois cadastra o agendamento
    $sqlAgendamento = "INSERT INTO agendamentos
    (cliente_id, quadra_id, data, hora, duracao, observacao)
    VALUES
    ('$cliente_id', '$quadra_id', '$data', '$hora', '$duracao', '$observacao')";

    if (mysqli_query($conexao, $sqlAgendamento)) {

        $id = mysqli_insert_id($conexao);

        header("Location: confirmacao.php?id=".$id);
        exit();

    } else {

        echo "<script>
            alert('Erro ao salvar agendamento.');
            window.history.back();
        </script>";

    }

} else {

    echo "<script>
        alert('Erro ao cadastrar cliente.');
        window.history.back();
    </script>";

}

?>