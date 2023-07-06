<?php

if (isset($_GET['id'])) {

    $conexao = mysqli_connect("localhost", "root", "", "pietreRevista");


    if ($conexao) {

        $id = $_GET['id'];
        $consulta = "DELETE FROM artigo WHERE id_artigo = '$id'";

        $resultado = mysqli_query($conexao, $consulta);
        if ($resultado) {
            header("refresh:2;url=index.php");
            echo ("Exclusão realizada com sucesso.");
        } else {
            echo "Erro ao excluir artigo: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);

    } else {
        echo "Erro na conexao com a base de dados: " . mysqli_connect_error();
    }

} else {
    echo "ID do artigo não foi fornecido.";
}
?>