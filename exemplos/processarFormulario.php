<?php
//verifica se o furmulario foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados enviado pelo formuário
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    // Validação dos dados (opcional)
    // Aqui você pode adicionar validações adicionais, se necessario

    // conexão com a base de dados
    $conexao = mysqli_connect("localhost", "root", "", "hospitalmesquita");

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao) {
        // Prepara a consulta SQL para inserir os dados na base de dados
        $consulta = "INSERT INTO especialidades (nome, descricao) VALUES ('$nome', '$descricao')";
        
        // Executa a consulta SQL
        $resultado = mysqli_query($conexao, $consulta);

        // Verifica se a consulta foi executada
        if($resultado) {
            echo "Especialidade cadastrada com sucesso!";
            // reireciona para a página de cadastro após 3 segundos
            header("refresh:3;url=aula.html");

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