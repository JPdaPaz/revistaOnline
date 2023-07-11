<?php
//verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conexao = mysqli_connect("localhost", "root", "", "revistaPietre");

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao) {

        $senha = $_POST["senha"];
        $ID_publi = $_POST["id_publicador"];
        $consulta2 = "SELECT * FROM conta, conta_publi WHERE conta_publi.ID_publi = '$ID_publi' AND conta.senha = '$senha' AND conta_publi.id_conta=conta.ID_conta";
        $resultado2 = mysqli_query($conexao, $consulta2);

        if (mysqli_num_rows($resultado2) > 0) {
            // Obtém os dados enviado pelo formuário
            $titulo = $_POST["titulo"];
            $classificacao = $_POST["classificacao"];
            $link_drive = $_POST["link_drive"];
            $data_publi = $_POST["data_publi"];
            $id_publicador = $_POST["id_publicador"];

            // Validação dos dados (opcional)
            // Aqui você pode adicionar validações adicionais, se necessario

            // conexão com a base de dados

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
                header("refresh:2;url=publicar.php");
            }
        } else {
            echo "Erro no login, tente novamente.";
            header("refresh:2;url=publicar.php");
        }

        // Fecha a conexão com a base de dados
        mysqli_close($conexao);
    } else {
        echo "Falha na conexão com a base de dados: " . mysqli_connect_error();
    }
}
?>