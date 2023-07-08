<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="top">
        <header>
            <img src="images/OIP.png">
            <h1>Pietre</h1>
        </header>

        <form method="POST">

            <div class="formGroup">
                <label for="nome">Email:</label>
                <input type="text" class="formInput" name="email" required>
            </div>

            <div class="formGroup">
                <label for="nome">Senha:</label>
                <input type="text" class="formInput" name="senha" required>
            </div>

            <div class="formGroup">
                <label for="nome">Username:</label>
                <input type="text" class="formInput" name="username" required>
            </div>

            <div class="formGroup">
                <label for="nome">Nome:</label>
                <input type="text" class="formInput" name="nome" required>
            </div>

            <div class="formGroup">
                <label for="nome">Sobrenome:</label>
                <input type="text" class="formInput" name="sobrenome" required>
            </div>

            <div class="formGroup">
                <label for="nome">Data de nascimento (yyyyMMdd):</label>
                <input type="text" class="formInput" name="data_nasc" required>
            </div>

            <button type="submit" class="submit">Criar conta</button>

        </form>

    </div>

    <div class="container">
        <div class="menu">
            <ul>
                <a href="index.php">
                    <li>
                        Pesquisa
                    </li>
                </a>
                <a href="criarContaPubli.php">
                    <li>
                        Conta de publicador
                    </li>
                </a>
            </ul>
        </div>
    </div>

</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");
    if ($conexao) {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $username = $_POST["username"];
        $data_nasc = $_POST["data_nasc"];
        $consulta = "INSERT INTO conta (nome, sobrenome, email, senha, username, data_nasc) VALUES ('$nome',  '$sobrenome', '$email', '$senha', '$username', '$data_nasc')";
        $resultado = mysqli_query($conexao, $consulta);

        if ($resultado) {

            $consulta = "SELECT * FROM conta WHERE email = '$email' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $consulta);
            $conta = mysqli_fetch_assoc($resultado);

            echo "Conta registrada com sucesso! Seu ID da conta base é " . $conta['ID_conta'];
            ?>
            <a href="loginConta.php"
                onclick="return confirm('Memorize seu ID da conta base!! Você não será capaz de consultá-lo novamente!')">Fechar
                janela</a>
            <?php




        } else {
            echo "Ocorreu um erro ao criar conta: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

}
?>