<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exclusão de cadastros</title>
</head>

<body>

    <div class="top">
        <header>
            <img src="images/OIP.png">
            <h1>Pietre</h1>
        </header>
    </div>

    <div class="container1">
        <div class="tabela">
            <form method="POST" class="formulario">

                <div class="inputs">
                    <div class="formGroup">
                        <label>ID do publicador:</label>
                        <input type="text" class="formInput" name="ID_publi" required>
                    </div>

                    <div class="formGroup">
                        <label>Senha:</label>
                        <input type="password" class="formInput" name="senha" required>
                    </div>
                    <div class="submit">
                        <button type="submit" class="botao"><a
                                onclick="return confirm('Você tem certeza?')">Excluir</a></button>
                    </div>
                </div>
        </div>
    </div>
    </form>

    </div>
</body>

</html>


<?php

if (isset($_GET['ID_artigo'])) {

    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");


    if ($conexao) {

        $id = $_GET['ID_artigo'];

        $consulta = "SELECT * FROM artigo WHERE ID_artigo='$id'";

        $resultado = mysqli_query($conexao, $consulta);



        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $senha = $_POST["senha"];
            $ID_publi = $_POST["ID_publi"];
            $consulta2 = "SELECT * FROM conta, conta_publi WHERE conta_publi.ID_publi = '$ID_publi' AND conta.senha = '$senha' AND conta_publi.id_conta=conta.ID_conta";
            $resultado2 = mysqli_query($conexao, $consulta2);

            if (mysqli_num_rows($resultado2) > 0) {

                $consulta3 = "SELECT * FROM artigo WHERE id_publicador = '$ID_publi' AND ID_artigo = '$id'";
                $resultado3 = mysqli_query($conexao, $consulta3);

                if (mysqli_num_rows($resultado3) > 0) {


                    $consulta4 = "DELETE FROM artigo WHERE ID_artigo = '$id'";

                    $resultado4 = mysqli_query($conexao, $consulta4);
                    if ($resultado4) {
                        ?>
                        <div class="phpMensagem">
                            <?php
                            echo ("Exclusão realizada com sucesso.");
                            ?>
                        </div>
                        <?php
                        header("refresh:2;url=loginConta.php");
                    } else {
                        ?>
                        <div class="phpMensagem">
                            <?php
                            echo "Erro ao excluir artigo: " . mysqli_error($conexao);
                            ?>
                        </div>
                        <?php
                        header("refresh:2;url=loginConta.php");
                    }


                } else {
                    ?>
                    <div class="phpMensagem">
    <?php
                                    echo "A conta logada não é a correspondente ao cadastro.";
                                    ?>
                    </div>
<?php
                }

            } else {
                ?>
                <div class="phpMensagem">
    <?php
                            echo "Erro no login, tente novamente.";
                            ?>
                </div>
<?php
            }
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

} else {
    ?>
    <div class="phpMensagem">
    <?php
    echo "ID do artigo não foi fornecido.";
    ?>
    </div>
<?php
}
?>