<html>

<head>
    <meta charset="UTF-8">
    <title>Adiciona Lista</title>
    <link rel="icon" type="image/png" href="imagens/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
</head>

<body>

    <?php
    session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $database = "avalia_acesso_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }else{
    echo $database;
    echo $_SERVER["REQUEST_METHOD"];
   }
   $usu1 = $_SESSION ['login'] ;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome    = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);   
    $notageral = $conn->real_escape_string($_POST['notageral']); 
    $fk_usuario = $_SESSION['login'];
    echo $nome;
    echo $database;
    $sql = "INSERT INTO estabelecimentos_avaliados (Nome_Estabelecimento, Descricao, NotaGeral, FK_USUARIOS_CADASTRADOS, FK_ESTABELECIMENTOS_CADASTRADOS) 
    VALUES ('$nome', '$descricao', '$notageral', (SELECT ID FROM usuarios WHERE Nome = '$usu1'), 
            (SELECT ID FROM estabelecimentos WHERE Nome = '$nome'))";
   }
    if ($result = $conn->query($sql)) {
        $msg = "Estabelecimento cadastrado com sucesso!";
        echo $msg;
    } else {
        $msg = "Erro executando INSERT: " . $conn-> error . " Tente novo cadastro.";
        echo $msg;
    }
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem']        = $msg;
    header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
    $conn->close(); 
    ?>
</body>
</html>