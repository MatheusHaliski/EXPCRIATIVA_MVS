<html>
	<head>
      <meta charset="UTF-8">  
	  <title>IE - Instituição de Ensino</title>
	  <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body>

<?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $database = "avalia_acesso_db";
    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $usuario = $conn->real_escape_string($_POST['username']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['password']); // prepara a string recebida para ser utilizada em comando SQL
    

    // Faz Select na Base de Dados
    $sql = "SELECT * FROM usuarios WHERE  Nome = '$usuario' AND Senha = md5('$senha')";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
            $row = $result->fetch_assoc();
            $_SESSION ['login'] = $usuario;
            $_SESSION ['senha'] = $senha;
            $_SESSION['nao_autenticado']=false;                         // Agora está logado
            echo "Usuário encontrado: " . $row['Nome'];
            header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
        }else{
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Login";
            $_SESSION['mensagem']        = "Senha ou usuário incorreto.";
            $conn->close();  //Encerra conexao com o BD
            header('location: http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php'); 
            exit();
        }
    }
    else {
        $msg = "Erro ao acessar o BD: " . $conn-> error . ".";
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Login";
        $_SESSION['mensagem']        = $msg;
        $conn->close();  //Encerra conexao com o BD
        header('location: http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php'); 
    }
?>
	</body>
</html>
