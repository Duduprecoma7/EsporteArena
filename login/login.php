<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Arena Sports</title>

    <link rel="stylesheet" href="../assets/style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {

            height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            background: linear-gradient(135deg, #2563eb, #4f46e5, #7c3aed);

        }

        .login {

            width: 400px;

            background: white;

            padding: 35px;

            border-radius: 20px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .2);

        }

        .login h2 {

            text-align: center;

            margin-bottom: 25px;

            color: #4f46e5;

        }

        input {

            width: 100%;

            padding: 15px;

            margin-bottom: 20px;

            border: 1px solid #ccc;

            border-radius: 10px;

            font-size: 16px;

        }

        button {

            width: 100%;

            padding: 15px;

            background: linear-gradient(90deg, #2563eb, #4f46e5, #7c3aed);

            color: white;

            border: none;

            border-radius: 10px;

            cursor: pointer;

            font-size: 17px;

        }

        button:hover {

            opacity: .9;

        }

        a {

            display: block;

            margin-top: 20px;

            text-align: center;

            text-decoration: none;

            color: #4f46e5;

            font-weight: bold;

        }
    </style>

</head>

<body>

    <div class="login">

        <h2>Login </h2>

        <form action="validar.php" method="POST">

            <input type="text" name="usuario" placeholder="Usuário" required>

            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">

                Entrar

            </button>

        </form>

        <a href="../index.php">

            ← Voltar ao Site

        </a>

    </div>

</body>

</html>