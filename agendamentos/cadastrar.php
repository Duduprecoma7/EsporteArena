<?php
include("../config/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #eef2f7;
        }

        .container {
            width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #4f46e5;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            resize: none;
            height: 90px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 15px;
            border: none;
            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);
            color: white;
            font-size: 17px;
            border-radius: 10px;
            cursor: pointer;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            color: #4f46e5;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Novo Agendamento</h2>

        <form action="salvar.php" method="POST">

            <label>Nome do Cliente</label>
            <input type="text" name="nome" placeholder="Digite seu nome" required>

            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="Digite seu telefone" required>

            <label>Quadra</label>
            <select name="quadra_id" required>
                <option value="">Selecione a Quadra</option>
                <option value="1"> Quadra de Areia</option>
                <option value="2"> Campo Society</option>
            </select>

            <label>Data</label>
            <input type="date" name="data" required>

            <label>Hora</label>
            <input type="time" name="hora" required>

            <label>Duração (Horas)</label>
            <input type="number" name="duracao" min="1" max="8" required>

            <label>Observação</label>
            <textarea name="observacao" placeholder="Opcional"></textarea>

            <button type="submit">Agendar Quadra</button>

        </form>

        <a href="../index.php">← Voltar para Página Inicial</a>

    </div>

</body>

</html>