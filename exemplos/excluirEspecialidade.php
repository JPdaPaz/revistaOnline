<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexao = mysqli_connect("localhost", "root", "", "hospitalmesquita");
    if ($conexao) {
        $consulta = "DELETE FROM especialidades WHERE id = '$id'";


        $resultado = mysqli_query($conexao, $consulta);
        if ($resultado) {
            header("Location: listarEspecialidades.php");
            exit();
        } else {
            echo "Erro ao excluir a especialidade médica: " . mysqli_error($conexao);
        }
        mysqli_close($conexao);
    } else {
        echo "Falha na conexao com a base de dados: " . mysqli_connect_error();
    }
} else {
    echo "ID da especialidade médica não fornecido.";
}
?>