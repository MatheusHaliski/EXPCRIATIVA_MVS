<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "PUC@1234";
$database = "avalia_acesso_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
} else {
    echo $database;
}
$ID = $_POST['ID'];
$nome = $_POST['nome']; 
$senha = $_POST['confirmPassword'];   
$_SESSION['excluido']=0;
if ($senha == $_SESSION['senha']) {
    $sql1 = "SELECT * FROM estabelecimentos_avaliados WHERE Nome_Estabelecimento='$nome' AND ID='$ID'";
    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        $sql = "DELETE FROM estabelecimentos_avaliados WHERE Nome_Estabelecimento='$nome' AND ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['excluido']=1;
        }
    }else{
        $_SESSION['excluido']=0;
    }
    echo $_SESSION['excluido'];
    
}

echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php'</script>";

$conn->close(); 

?>
