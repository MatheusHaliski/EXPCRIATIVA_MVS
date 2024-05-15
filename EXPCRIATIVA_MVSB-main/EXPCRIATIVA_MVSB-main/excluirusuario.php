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

$id = $_POST['id'];    
$nome = $_POST['nome']; 
$senha = $_POST['confirmPassword'];   
$_SESSION['excluidou']=0;

if ($senha == $_SESSION['senha']) {
    $sql1 = "SELECT * FROM usuarios WHERE ID='$id' AND Nome='$nome'";
    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        $sql = "DELETE FROM usuarios WHERE ID='$id' AND Nome='$nome'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['excluidou']=1;
        }
    }else{
        $_SESSION['excluidou']=0;
    }
    
}

echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php'</script>";

$conn->close(); 

?>