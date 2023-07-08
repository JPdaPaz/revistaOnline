<?php
//verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados enviado pelo formuário
    $titulo = $_POST["titulo"];
    $classificacao = $_POST["classificacao"];
    $link_drive = $_POST["link_drive"];
    $data_publi = $_POST["data_publi"];
    $id_publicador = $_POST["id_publicador"];

    // Validação dos dados (opcional)
    // Aqui você pode adicionar validações adicionais, se necessario

    // conexão com a base de dados
    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao) {

        $consulta = "SELECT * FROM conta_publi WHERE ID_publi = '$id_publicador'";
        $resultado = mysqli_query($conexao, $consulta);

        if($resultado){
        // Prepara a consulta SQL para inserir os dados na base de dados
        $consulta = "INSERT INTO artigo (titulo,  classificacao, link_drive, data_publi, id_publicador) VALUES ('$titulo',  '$classificacao', '$link_drive', '$data_publi', '$id_publicador')";

        // Executa a consulta SQL
        $resultado = mysqli_query($conexao, $consulta);

        // Verifica se a consulta foi executada
        if ($resultado) {
            echo "Artigo cadastrado com sucesso!";
            // reireciona para a página de cadastro após 3 segundos
            header("refresh:2;url=publicar.php");

        } else {
            echo "ocorreu um erro ao cadastrar o artigo: " . mysqli_error($conexao);
        }
    } else {
        echo "Publicador não existente";
        header("refresh:3;url=publicar.php");
    }
        // Fecha a conexão com a base de dados
        mysqli_close($conexao);
    } else {
        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
    }
}
?>