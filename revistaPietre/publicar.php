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
            <form action="processarFormulario.php" method="POST" class="formulario">

                <div class="inputs">
                    <h3>É necessária uma <a class="link" href="criarContaPubli.php">Conta de Publicador</a>!
                    </h3>
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
                        <label for="nome">ID do publicador:</label>
                        <input type="text" class="formInput" name="id_publicador" required>
                    </div>

                    <div class="formGroup">
                        <label for="nome">Senha:</label>
                        <input type="password" class="formInput" name="senha" required>
                    </div>



                    <div class="submit">
                        <button type="submit" class="botao" id="botaoCadastrar">Cadastrar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>


</body>

</html>