<?php

$conexao = mysqli_connect("localhost", "root", "", "hospitalmesquita");

if ($conexao) {
    $consulta = "SELECT * FROM especialidades";
    $resultado = mysqli_query($conexao, $consulta);


    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Lista de Especialidades Médicas</title>
    </head>

    <body>

        <header>
            <nav class=navbar navbar-expand-lg navbar-dark bg-dark>
                <div class="container">
                    <a class="navbar-brand" href="#">Hospital Mesquita dos Trabalhadores</a>
                </div>
            </nav>
        </header>

        <div class="container mt-5">
            <h1>Lista de Especialidades Médicas</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($especialidade = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $especialidade['id']; ?>
                            </td>
                            <td>
                                <?php echo $especialidade['nome']; ?>
                            </td>
                            <td>
                                <?php echo $especialidade['descricao']; ?>
                            </td>
                            <td>
                                <a href="editarEspecialidade.php?id=<?php echo $especialidade['id']; ?>"
                                    class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <a href="excluirEspecialidade.php?id=<?php echo $especialidade['id']; ?>"
                                    class="btn btn-danger" onclick="return confirm('Você tem certeza?')">Excluir</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    </body>

    </html>

    <?php

    mysqli_close($conexao);
} else {
    echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
}
?>