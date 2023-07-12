<?php


if (isset($_GET['ID_artigo'])) {

    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");


    if ($conexao) {

        $id = $_GET['ID_artigo'];
        $consulta = "SELECT * FROM artigo WHERE ID_artigo='$id'";

        $resultado = mysqli_query($conexao, $consulta);


        if (mysqli_num_rows($resultado) > 0) {

            $artigo = mysqli_fetch_assoc($resultado);

            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                $senha = $_POST["senha"];
                $ID_publi = $_POST["ID_publi"];
                $consulta2 = "SELECT * FROM conta, conta_publi WHERE conta_publi.ID_publi = '$ID_publi' AND conta.senha = '$senha' AND conta_publi.id_conta=conta.ID_conta";
                $resultado2 = mysqli_query($conexao, $consulta2);

                if (mysqli_num_rows($resultado2) > 0) {

                    $consulta3 = "SELECT * FROM artigo WHERE id_publicador = '$ID_publi' AND ID_artigo = '$id'";
                    $resultado3 = mysqli_query($conexao, $consulta3);

                    if (mysqli_num_rows($resultado3) > 0) {

                        $titulo = $_POST["titulo"];
                        $classificacao = $_POST["classificacao"];
                        $link_drive = $_POST["link_drive"];
                        $data_publi = $_POST["data_publi"];
                        $atualizar = "UPDATE artigo  SET  titulo = '$titulo', classificacao = '$classificacao', link_drive = '$link_drive', data_publi = '$data_publi' WHERE ID_artigo = '$id'";
                        $resultado_atualizar = mysqli_query($conexao, $atualizar);

                        if ($resultado_atualizar) {
                            ?>
                            <div class="phpMensagem">
                                <?php
                                echo "Artigo atualizado com sucesso!";
                                ?>
                            </div>
                            <?php
                            header("refresh:2;url=loginConta.php");
                        } else {
                            echo "Ocorreu um erro ao atualizar cadastro: " . mysqli_error($conexao);
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


        } else {
            ?>
            <div class="phpMensagem">
    <?php
                    echo "Artigo não encontrado.";
                    ?>
            </div>
<?php
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

} else {
    ?>
    <div class="phpMensagem">
    <?php
    echo ("ID não informado.");
    ?>
    </div>
<?php
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edição de cadastros</title>
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
                        <label for="nome">ID do publicador:</label>
                        <input type="text" class="formInput" name="ID_publi" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Senha:</label>
                        <input type="password" class="formInput" name="senha" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Título:</label>
                        <input type="text" class="formInput" name="titulo" value="<?php echo $artigo['titulo']; ?>"
                            required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Classificação indicativa:</label>
                        <input type="text" class="formInput" name="classificacao"
                            value="<?php echo $artigo['classificacao']; ?>" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Link do drive:</label>
                        <input type="text" class="formInput" name="link_drive"
                            value="<?php echo $artigo['link_drive']; ?>" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Data de publicação (yyyyMMdd):</label>
                        <input type="text" class="formInput" name="data_publi"
                            value="<?php echo $artigo['data_publi']; ?>" required>
                    </div>

                    <div class="submit">
                        <button type="submit" class="botao" id="botaoSalvar">Salvar</button>
                    </div>

                </div>


            </form>
        </div>
    </div>

    </div>
</body>

</html>