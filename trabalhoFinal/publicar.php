<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="top">
        <header>
            <img src="images/OIP.png">
            <h1>Pietre</h1>
        </header>

        <form action="processarFormulario.php" method="POST">

            <div class="formGroup">
                <label for="nome">Título:</label>
                <input type="text" class="formInput" name="titulo" required>
            </div>

            <div class="formGroup">
                <label for="nome">Classificação indicativa:</label>
                <input type="text" class="formInput" name="classificacao" required>
            </div>

            <div class="formGroup">
                <label for="nome">Link do drive:</label>
                <input type="text" class="formInput" name="link_drive" required>
            </div>

            <div class="formGroup">
                <label for="nome">Data de publicação (yyyyMMdd):</label>
                <input type="text" class="formInput" name="data_publi" required>
            </div>

            <div class="formGroup">
                <label for="nome">ID do pesquisador:</label>
                <input type="text" class="formInput" name="id_pesquisador" required>
            </div>

            <button type="submit" class="submit">Cadastrar</button>

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