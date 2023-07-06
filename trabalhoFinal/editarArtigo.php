<?php


if (isset($_GET['id'])) {


$conexao = mysqli_connect("localhost", "root", "", "pietreRevista");


if ($conexao) {

    $id = $_GET['id'];
    $consulta = "SELECT * FROM artigo WHERE id_artigo='$id'";

    $resultado = mysqli_query($conexao, $consulta);


    if (mysqli_num_rows($resultado) > 0) {
        $artigo = mysqli_fetch_assoc($resultado);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titulo = $_POST["titulo"];
            $classificacao = $_POST["classificacao"];
            $link_drive = $_POST["link_drive"];
            $data_publi = $_POST["data_publi"];
            $atualizar = "UPDATE artigo  SET  titulo = '$titulo', classificacao = '$classificacao', link_drive = '$link_drive', data_publi = '$data_publi' WHERE id_artigo = '$id'";
            $resultado_atualizar = mysqli_query($conexao, $atualizar);

            if ($resultado_atualizar) {
                echo "Artigo atualizado com sucesso!";
                header("refresh:2;url=index.php");
            } else {
                echo "Ocorreu um erro ao atualizar cadastro: " . mysqli_error($conexao);
            }
        }
    } else {
        echo "Artigo não encontrado.";
    }

    mysqli_close($conexao);

} else {
    echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
}

} else {
    echo ("ID não informado.");
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
        <form action="busca.php" method="POST">
            <input type="text" class="pesquisa" name="id_artigo" placeholder="Pesquise artigos por ID...">
            <button type="submit" class="botaoBuscar">Buscar</button>
        </form>
    </div>

    <div class="container">
        <div class="menu">
            <ul>
                <a href="publicar.php">
                    <li>
                        Publicar
                    </li>
                </a>
                <a href="criaConta.php">
                    <li>
                        Conta
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <form method="POST">

        <div class="formGroup">
            <label for="nome">Título:</label>
            <input type="text" class="formInput" name="titulo" value="<?php echo $artigo['titulo']; ?>" required>
        </div>

        <div class="formGroup">
            <label for="nome">Classificação indicativa:</label>
            <input type="text" class="formInput" name="classificacao" value="<?php echo $artigo['classificacao']; ?>"
                required>
        </div>

        <div class="formGroup">
            <label for="nome">Link do drive:</label>
            <input type="text" class="formInput" name="link_drive" value="<?php echo $artigo['link_drive']; ?>"
                required>
        </div>

        <div class="formGroup">
            <label for="nome">Data de publicação (yyyyMMdd):</label>
            <input type="text" class="formInput" name="data_publi" value="<?php echo $artigo['data_publi']; ?>"
                required>
        </div>

        <div class="formGroup">
            <label for="nome">ID do pesquisador:</label>
            <input type="text" class="formInput" name="id_pesquisador" value="<?php echo $artigo['id_pesquisador']; ?>"
                required>
        </div>

        <button type="submit" class="submit">Salvar</button>

    </form>

    </div>
</body>

</html>