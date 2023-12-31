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

        <div class="container">
            <div class="menu">
                <ul>
                    <a href="loginConta.php">
                        <li>
                            Pesquisa
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
                        <label for="nome">ID da conta base:</label>
                        <input type="text" class="formInput" name="idbase" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Senha da conta base:</label>
                        <input type="password" class="formInput" name="senhabase" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Área de atuação:</label>
                        <input type="text" class="formInput" name="area" required>
                    </div>


                    <div class="submit">
                        <button type="submit" class="botao">Tornar-se publicador</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");
    if ($conexao) {

        $id_conta = $_POST["idbase"];
        $senha = $_POST["senhabase"];
        $consulta = "SELECT * FROM conta WHERE ID_conta = '$id_conta' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $consulta);


        if (mysqli_num_rows($resultado) > 0) {

            $area = $_POST["area"];

            $consulta = "INSERT INTO conta_publi (id_conta, area) VALUES ('$id_conta', '$area')";
            $resultado = mysqli_query($conexao, $consulta);

            if ($resultado) {

                $consulta = "SELECT * FROM conta_publi WHERE id_conta = '$id_conta'";
                $resultado = mysqli_query($conexao, $consulta);
                $publi = mysqli_fetch_assoc($resultado);

                ?>
                <div class="container1">
                    <div class="sucesso">
                        <?php echo "Conta registrada com sucesso! Seu ID de publicador é " . $publi['ID_publi']; ?>
                    </div>
                    <a class="botao" id="botaoFecharJanela" href="publicar.php"
                        onclick="return confirm('Memorize seu ID de publicador!! Você não será capaz de consultá-lo novamente!')">x</a>

                </div>
                <?php
            } else {
                ?>
                <div class="phpMensagem">
                    <?php
                    echo "Ocorreu um erro ao criar conta: " . mysqli_error($conexao);
                    ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="phpMensagem">
    <?php
                    echo "Erro no login";
                    ?>
            </div>
<?php
        }

        mysqli_close($conexao);

    } else {
        ?>
        <div class="phpMensagem">
    <?php
            echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
            ?>
        </div>
<?php
    }

}
?>