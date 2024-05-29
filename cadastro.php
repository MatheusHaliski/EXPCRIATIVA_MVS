<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>IE - Instituição de Ensino</title>
    <link rel="icon" type="image/png" href="imagens/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    $_SESSION['nao_autenticado'] = false;
    $servername = "localhost: 3306";
    $username = "root";
    $password = "2606Bst*";
    $database = "avalia_acesso_db";
    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }else{
    echo $database;
   }
    $nome    = $conn->real_escape_string($_POST['nome']);    // prepara a string recebida para ser utilizada em comando SQL
    $sobrenome   = $conn->real_escape_string($_POST['sobrenome']);   // prepara a string recebida para ser utilizada em comando SQL
    $celular = $conn->real_escape_string($_POST['celular']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['senha']);   // prepara a string recebida para ser utilizada em comando SQL
    $email = $conn->real_escape_string($_POST['email']); // prepara a string recebida para ser utilizada em comando SQL
    $foto= $conn->real_escape_string($_POST['avatar']); // prepara a string recebida para ser utilizada em comando SQL
    $sorteNumero= $conn->real_escape_string($_POST['luckyNumber']);
    $nameMother= $conn->real_escape_string($_POST['motherName']);
    $genero= $conn->real_escape_string($_POST['gender']); // prepara a string recebida para ser utilizada em comando SQL
    //$numeroSorte = $conn->real_escape_string($_POST['luckyNumber']);
    $target_directory = "img/"; // Diretório onde os arquivos serão armazenados
    $target_file = $target_directory . basename($_FILES["avatar"]["name"]); // Caminho do arquivo de imagem
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
    $imagem_binaria = file_get_contents($target_file); // Lê os dados binários da imagem
    $imagem_binaria = $conn->real_escape_string($imagem_binaria); // Prepara os dados binários para serem usados em uma consulta SQL

   echo $target_directory;
   echo $target_file;
    $avatar_path = $target_file;
    //Criptografa Senha
	$md5Senha = md5($senha);
    echo $md5Senha;

    $sql = "INSERT INTO usuarios(Nome,Senha,Foto,Sobrenome,Email,Celular,Genero,numeroSorte,nomeMae) VALUES ('$nome','$md5Senha','$imagem_binaria','$sobrenome','$email','$celular','$genero', '$sorteNumero','$nameMother')";

    if ($result = $conn->query($sql)) {
        $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
        echo $msg;
        $_SESSION['recem-cadast']=true;
        $_SESSION['login_incorreto']==false;
    } else {
        $msg = "Erro executando INSERT: " . $conn-> error . " Tente novo cadastro.";
        echo $msg;
        $_SESSION['recem-cadast']=false;
        $_SESSION['login_incorreto']==false;
    }
    $_SESSION['nao_autenticado'] = true;
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem'] = $msg;
    $_SESSION['img'] = $avatar_path;
    header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    $conn->close();  
    ?>
</body>
</html> 
