<?php
// Inicia a sessão para acessar as variáveis de sessão
session_start();

// Conexão com o banco de dados
$servername = "localhost: 3306";
$username = "root";
$password = "2606Bst*";
$database = "avalia_acesso_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o parâmetro 'id' está presente na URL
if(isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    // Obtém o nome de usuário e senha da sessão
    $nome_usuario = $_SESSION['login'];
    $senha = $_SESSION['senha'];

    // Consulta SQL para recuperar a imagem com base no nome de usuário e senha
    $sql = "SELECT Foto FROM usuarios WHERE Nome = '$nome_usuario' AND Senha = MD5('$senha')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se a imagem for encontrada, recupera os dados da imagem e define o cabeçalho Content-Type como imagem
        $row = $result->fetch_assoc();
        header("Content-Type: image/jpeg");
        // Exibe os dados binários da imagem
        echo $row['Foto'];
    } else {
        // Se a imagem não for encontrada, exibe uma mensagem de erro ou uma imagem padrão
        echo "Imagem não encontrada.";
    }
} else {
    // Se o parâmetro 'id' não estiver presente na URL, exibe uma mensagem de erro
    echo "ID da imagem não fornecido.";
}

// Fecha a conexão
$conn->close();
?>
