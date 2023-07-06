<?php
//verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados enviado pelo formuário
    $titulo = $_POST["titulo"];
    $classificacao = $_POST["classificacao"];
    $link_drive = $_POST["link_drive"];
    $data_publi = $_POST["data_publi"];
    $id_pesquisador = $_POST["id_pesquisador"];

    // Validação dos dados (opcional)
    // Aqui você pode adicionar validações adicionais, se necessario

    // conexão com a base de dados
    $conexao = mysqli_connect("localhost", "root", "", "pietreRevista");

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao) {
        // Prepara a consulta SQL para inserir os dados na base de dados
        $consulta = "INSERT INTO artigo (titulo,  classificacao, link_drive, data_publi, id_pesquisador) VALUES ('$titulo',  '$classificacao', '$link_drive', '$data_publi', '$id_pesquisador')";

        // Executa a consulta SQL
        $resultado = mysqli_query($conexao, $consulta);

        // Verifica se a consulta foi executada
        if ($resultado) {
            echo "Especialidade cadastrada com sucesso!";
            // reireciona para a página de cadastro após 3 segundos
            header("refresh:2;url=publicar.php");

        } else {
            echo "ocorreu um erro ao cadastrar a especialidade: " . mysqli_error($conexao);

        }
        // Fecha a conexão com a base de dados
        mysqli_close($conexao);
    } else {
        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();

    }
}
?>