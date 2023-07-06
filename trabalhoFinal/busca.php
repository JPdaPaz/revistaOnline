<?php

$id = $_POST['id_artigo'];
if ($id) {
    $conexao = mysqli_connect("localhost", "root", "", "pietreRevista");

    if ($conexao) {
        $consulta = "SELECT * FROM artigo where artigo.id_artigo = '$id'";
        $resultado = mysqli_query($conexao, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            ?>

            <div class="tabela">
                <h1>Artigo Buscado</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Classificação</th>
                            <th>Link de acesso</th>
                            <th>Data da publicação</th>
                            <th>ID do pesquisador</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $artigo = mysqli_fetch_assoc($resultado)
                            ?>
                        <div class="consulta">
                            <tr>
                                <td>
                                    <?php echo $artigo['id_artigo']; ?>
                                </td>
                                <td>
                                    <?php echo $artigo['titulo']; ?>
                                </td>
                                <td>
                                    <?php echo $artigo['classificacao']; ?>
                                </td>
                                <td>
                                    <?php echo $artigo['link_drive']; ?>
                                </td>
                                <td>
                                    <?php echo $artigo['data_publi']; ?>
                                </td>
                                <td>
                                    <?php echo $artigo['id_pesquisador']; ?>
                                </td>
                                <td>
                                    <a href="editarArtigo.php?id=<?php echo $artigo['id']; ?>" class="botaoEditar">Editar</a>
                                </td>
                                <td>
                                    <a href="excluirArtigo.php?id=<?php echo $artigo['id']; ?>" class="botaoExcluir"
                                        onclick="return confirm('Você tem certeza?')">Excluir</a>
                                </td>
                            </tr>
                        </div>
                    </tbody>
                </table>
            </div>

            <?php

        } else {
            echo "Artigo não encontrado.";
        }
        mysqli_close($conexao);
    } else {

        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
    }
} else {
    ?>
    ID não fornecido.
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
    <title>Página inicial</title>
</head>

<body>

    <div class="top">
        <header>
            <img src="images/OIP.png">
            <h1>Pietre</h1>
        </header>
        <form action="busca.php" method="POST">
            <input type="text" class="pesquisa" name="id_artigo" placeholder="Pesquise artigos...">
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
                <a href="Conta.php">
                    <li>
                        Conta
                    </li>
                </a>
            </ul>
        </div>
    </div>


</body>

</html>