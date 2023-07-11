<?php

if (isset($_GET['username'])) {

    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");
    if ($conexao) {
        $consulta = "SELECT * FROM artigo";
        $resultado = mysqli_query($conexao, $consulta);

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
                <form class="form" id="pesquisa" action="busca.php?" method="POST">
                    <input type="text" class="pesquisa" name="ID_artigo" placeholder="Pesquise artigos por ID...">
                    <button type="submit" class="botao" id="botaoBuscar">Buscar</button>
                </form>
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



            <div class="logado">
                Logado como:
                <?php echo " $_GET[username]" ?>
            </div>
            <div class="container1">
                <div class="tabela">
                    <h1>Lista de artigos cadastrados</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="td1">ID</th>
                                <th>Título</th>
                                <th class="td1">Classificação</th>
                                <th>Link de acesso</th>
                                <th class="td1">Data da publicação</th>
                                <th>ID do pesquisador</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            while ($artigo = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <div class="consulta">
                                    <tr>
                                        <td class="td1">
                                            <?php echo $artigo['ID_artigo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $artigo['titulo']; ?>
                                        </td>
                                        <td class="td1">
                                            <?php echo $artigo['classificacao']; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $artigo['link_drive']; ?>"><?php echo $artigo['link_drive']; ?></a>
                                        </td>
                                        <td class="td1">
                                            <?php echo $artigo['data_publi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $artigo['id_publicador']; ?>
                                        </td>
                                        <td>
                                            <a href="editarArtigo.php?ID_artigo=<?php echo $artigo['ID_artigo']; ?>" class="botao"
                                                id="botaoEditar">Editar</a>
                                        </td>
                                        <td>
                                            <a href="excluirArtigo.php?ID_artigo=<?php echo $artigo['ID_artigo']; ?>" class="botao"
                                                id="botaoExcluir">Excluir</a>
                                        </td>
                                    </tr>
                                </div>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>

        </html>


        <?php

        mysqli_close($conexao);

    } else {
        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
    }
} else {
    echo "Erro no login, você está sendo redirecionado.";
    header("refresh:3;url=loginConta.php");
}

?>