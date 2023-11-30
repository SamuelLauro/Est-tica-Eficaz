<?php
$host = '127.0.0.1';
$usuario = 'root';
$senha = '123456789';
$banco = 'eficaz';

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];
    // Adicionando a data e hora do contato
    $dataContato = date('Y-m-d H:i:s');

    $query = "INSERT INTO eficaz.Cliente (Nome, Email, Observacoes, DataContato) VALUES ('$nome', '$email', '$mensagem', '$dataContato')";
    
    if ($conexao->query($query) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }
}
?>




