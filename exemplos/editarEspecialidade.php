<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexao = mysqli_connect("localhost", "root", "", "hospitalmesquita");

    if ($conexao) {
        $consulta = "SELECT * FROM especialidades  WHERE  id = '$id'";


        $resultado = mysqli_query($conexao, $consulta);
        if (mysqli_num_rows($resultado) > 0) {
            $especialidade = mysqli_fetch_assoc($resultado);

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nome = $_POST["nome"];
                $descricao = $_POST["descricao"];
                $atualizar = "UPDATE especialidades  SET  nome = '$nome', descricao = '$descricao' WHERE id = '$id'";
                $resultado_atualizar = mysqli_query($conexao, $atualizar);

                if ($resultado_atualizar) {
                    echo "EspecialidaDe médica atualizada com sucesso!";
                    header("refresh:3;url=listarEspecialidades.php");
                } else {
                    echo "Ocorreu um erro ao atualizar a especialidade médica: " . mysqli_error($conexao);
                }
            }
        } else {
            echo "Especialidade médica não encontrada.";
        }
        mysqli_close($conexao);
    } else {
        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
    }
} else {
    echo "ID da especialidae médica não fornecido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar Especialidade Médica</title>
</head>

<body>

    <header>
        <nav class="navbar navabar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Hospital Mesquita dos Trabalhadores</a>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Editar Especialidade Medica</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="<?php echo $especialidade['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descricao</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"
                    required><?php echo $especialidade['descricao']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


</body>

</html>