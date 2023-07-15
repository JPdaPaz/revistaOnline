<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página inicial</title>
</head>

<body>

    <div class="top">
        <header>
            <img src="images/OIP.png">
            <h1>Pietre</h1>
        </header>

        <div class="container">
            <div class="menu">
                <ul>
                    <a href="publicar.php">
                        <li>
                            Publicar
                        </li>
                    </a>
                    <a href="criarConta.php">
                        <li>
                            Criar conta
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="tabela">
            <form method="POST" class="formulario">

                <div class="inputs">
                    <div class="formGroup">
                        <label for="nome">ID da conta:</label>
                        <input type="text" class="formInput" name="ID_conta" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Senha:</label>
                        <input type="password" class="formInput" name="senha" required>
                    </div>

                    <div class="submit">
                        <button type="submit" class="botao" id="botaoSubmit">Entrar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");
    if ($conexao) {

        $senha = $_POST["senha"];
        $ID_conta = $_POST["ID_conta"];
        $consulta = "SELECT * FROM conta WHERE ID_conta = '$ID_conta' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            ?>
            <div class="phpMensagem">
                <?php
                echo "Sucesso";
                ?>
            </div>
            <?php
            header("refresh:1;url=index.php?ID_conta=$ID_conta");
        } else {
            ?>
            <div class="phpMensagem">
                <?php
                echo "Erro no login, tente novamente.";
                ?>
            </div>
            <?php
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

}
?>