<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>IE - Instituição de Ensino</title>
    <link rel="icon" type="image/png" href="imagens/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
</head>

<body>

    <?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    $_SESSION['nao_autenticado'] = false;
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

    // Prepara as strings recebidas para serem utilizadas em comando SQL
    $nome = $conn->real_escape_string($_POST['nome']);
    $sobrenome = $conn->real_escape_string($_POST['sobrenome']);
    $celular = $conn->real_escape_string($_POST['celular']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $email = $conn->real_escape_string($_POST['email']);
    $foto = isset($_POST['avatar']) ? $conn->real_escape_string($_POST['avatar']) : 'img.png';
    $genero = $conn->real_escape_string($_POST['gender']);
    $usuarioadm = $conn->real_escape_string($_POST['usuarioadm']);
    $target_directory = "img/"; // Diretório onde os arquivos serão armazenados
    $target_file = $target_directory . basename($_FILES["avatar"]["name"]); // Caminho do arquivo de imagem
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
    $imagem_binaria = file_get_contents($target_file); // Lê os dados binários da imagem
    $imagem_binaria = $conn->real_escape_string($imagem_binaria); // Prepara os dados binários para serem usados em uma consulta SQL

   echo $target_directory;
   echo $target_file;
    $avatar_path = $target_file;
    // Criptografa a senha
    $md5Senha = md5($senha);

    // Verifica se o nome já existe na tabela
    $sql_check = "SELECT * FROM usuarios WHERE Nome = '$nome'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Nome já existe, redireciona para a página de login com uma mensagem de erro
        $_SESSION['recem-cadast'] = false;
        $_SESSION['login_incorreto'] = true;
        $_SESSION['mensagem_header'] = "Cadastro";
        $_SESSION['mensagem'] = "Erro: Nome de usuário já existe. Tente novamente.";
        header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    } else {
        // Nome não existe, prossegue com a inserção
        $sql = "INSERT INTO usuarios(Nome,Senha,Foto,Sobrenome,Email,Celular,Genero,usuarioadm) 
                VALUES ('$nome','$md5Senha','$imagem_binaria','$sobrenome','$email','$celular','$genero','$usuarioadm')";

        if ($result = $conn->query($sql)) {
            $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
            $_SESSION['recem-cadast'] = true;
            $_SESSION['login_incorreto'] = false;
        } else {
            $msg = "Erro executando INSERT: " . $conn->error . " Tente novo cadastro.";
            $_SESSION['recem-cadast'] = false;
            $_SESSION['login_incorreto'] = true;
        }

        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Cadastro";
        $_SESSION['mensagem'] = $msg;
        header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    }

    $conn->close();
    ?>
</body>

</html>
