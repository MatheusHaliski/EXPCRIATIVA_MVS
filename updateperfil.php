<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['login'])) {
    header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost: 3306";
    $username = "root";
    $password = "2606Bst*";
    $database = "avalia_acesso_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $celular =  $_POST['celular'];
    $sobrenome =$_POST['sobrenome'];
    $genero =  $_POST['genero'];
    $target_directory = "img/"; // Diretório onde os arquivos serão armazenados
    $target_file = $target_directory . basename($_FILES["foto"]["name"]); // Caminho do arquivo de imagem
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $imagem_binaria = file_get_contents($target_file); // Lê os dados binários da imagem
    $imagem_binaria = $conn->real_escape_string($imagem_binaria); // Prepara os dados binários para serem usados em uma consulta SQL
    $nome_usu = $_SESSION['login'];
    $senha_usu = $_SESSION['senha'];
    $sql = "UPDATE usuarios SET Nome='$nome', Senha=MD5('$senha'), Foto='$imagem_binaria',Sobrenome='$sobrenome',Genero='$genero',Celular='$celular',Email='$email' WHERE Nome='$nome_usu' AND Senha=MD5('$senha_usu')";
    $result = $conn->query($sql);
    
    if ($result) {
        $_SESSION['login']=$nome;
        $_SESSION['senha']=$senha;
        header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método não permitido.";
    header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
}
?>
