<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta de publicador</title>
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
                <label for="nome">ID da conta base:</label>
                <input type="text" class="formInput" name="idbase" required>
            </div>

            <div class="formGroup">
                <label for="nome">Senha:</label>
                <input type="text" class="formInput" name="senhabase" required>
            </div>

            <div class="formGroup">
                <label for="nome">Área de atuação:</label>
                <input type="text" class="formInput" name="area" required>
            </div>

            <button type="submit" class="submit">Tornar-se publicador</button>

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

        $id_conta = $_POST["idbase"];
        $senha = $_POST["senha"];
        $consulta = "SELECT * FROM conta WHERE ID_conta = '$id_conta' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $consulta);

        if ($resultado) {

            $area = $_POST["area"];

            $consulta = "INSERT INTO conta_publi (id_conta, area) VALUES ('$id_conta', '$area')";
            $resultado = mysqli_query($conexao, $consulta);

            if ($resultado) {

                $consulta = "SELECT * FROM conta_publi WHERE id_conta = '$id_conta'";
                $resultado = mysqli_query($conexao, $consulta);
                $publi = mysqli_fetch_assoc($resultado);

                echo "Conta registrada com sucesso! Seu ID de publicador é " . $publi['ID_publi'];
                ?>
                <a href="publicar.php"
                    onclick="return confirm('Memorize seu ID de publicador!! Você não será capaz de consultá-lo novamente!')">Fechar
                    janela</a>
                <?php
            } else {
                echo "Ocorreu um erro ao criar conta: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro no login";
            header("refresh:2;url=criarContaPubli.php");
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

}
?>