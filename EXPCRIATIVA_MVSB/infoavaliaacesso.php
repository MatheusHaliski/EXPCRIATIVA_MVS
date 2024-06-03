<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar-header{
            width: 400px;
       }
    .card-container {
      display: flex;
      flex-wrap: wrap;
    }
    body{
      background-color: rgb(65,126,126);
    }
 
 .card-button{
  background-color: rgb(150, 150, 143);
 }

 @media (min-width: 768px) {
#logo11{
  display:none;}

.navbar-nav{
position: relative;
left:-100px;
  }
  .active{
    position: relative;
left:-100px;
  }
  .dropdown{
    position: relative;
left:-120px;
  }
  .dropdown-toggle{
    position: relative;
left:20px;
  }
  .as{
    position: relative;
left:-110px;
  }
}
    @media (max-width: 768px) {
      #l1,#l2,#i1{
        display:none;
      }
      #l3{
        position: relative;
        left:25px;
      }
      #logo11{
        position:relative;
        left: 50px;
      }
      .navbar-header{
            background-color: #f8f7f7;
            color: #000;
            position: absolute;
            left: 30px;
            width: 500px;
       }
      .navbar-brand,#myNavbar{
  background-color: #f8f7f7;
  font-size: large;
  position: relative;
  left: 20px; 
  width:400px;
}
#logo11{
        position:relative;
        left: 50px;
        display:block;
      }
      #logo12{
  display:none;
}
      .navbar-header{
            background-color: #f8f7f7;
            color: #000;
            position: absolute;
            left: 30px;
            width: 500px;
       }
      .navbar-brand,#myNavbar{
  background-color: #f8f7f7;
  font-size: large;
  position: relative;
  left: 20px; 
  width:400px;
}
    }
      a{
        color: #000;
      }
      a.dropdown-toggle{
        color: #000;
      }
      #text{
        color: #000;
      }

      #cadastroModal {
    display: none;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 110px;
    left: 410px;
    width: 400px;
    height: 300px;
    background-color: #f5f5f5; 
    border: 31px solid #222;
    border-radius: 5px; 
    box-shadow: 10px 10px 10px 10px rgba(0,0,0,0.5); 
    z-index: 9999;
}

#modalTitulo {
  color: black; /* Cor do título */
  text-align: center; /* Centralizar texto */
  font-size: 31px;
  margin-top: 20px; /* Espaçamento entre a imagem e o título */
}

#modalMensagem {
  color: black; /* Cor do título */
  text-align: center; /* Centralizar texto */
  font-size: 21px;
}

.modal-content {
    background-color: white;
    padding: 20px;
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 16px;
}

#fecharModal {
  position: absolute;
  top: -31px;
  left: -31px;
  background-color: gray; /* Cor do botão */
  color: white; /* Cor do texto */
  padding: 7px 11px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}
.info-container {
      background-color: #fff;
      padding: 30px;
      margin-top: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .info-text {
      font-size: 18px;
      color: #333;
      line-height: 1.6;
    }
    .sequence-container {
      display: flex;
      align-items: center;
      justify-content: space-around;
      margin-top: 30px;
      animation: fadeIn 2s ease-in-out;
    }
    .sequence-step {
      display: flex;
      align-items: center;
      font-size: 20px;
      animation: fadeInUp 1s ease-in-out;
    }
    .sequence-step p {
      margin: 0 10px;
      font-size: 24px;
      color: #333;
    }
    .sequence-arrow {
      font-size: 30px;
      color: #333;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
<div id="cadastroModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom">
        <header class="w3-container w3-teal">
            <span onclick="fecharModal()" id="fecharModal" class="w3-button w3-large w3-display-topright">&times;</span>
            <img src="logo.png" alt="Imagem" style="width: 100px; height: auto; display: block; position:relative; top: 10px;left:120px; border:1px solid black;">
            <h2 id="modalTitulo">Mensagem Avalia Acesso</h2>
        </header>
        <div class="w3-container">
            <p id="modalMensagem"></p>
        </div>
    </div>
</div>
<script>
    function exibirModal(titulo, mensagem) {
        document.getElementById('modalTitulo').innerText = titulo;
        document.getElementById('modalMensagem').innerText = mensagem;
        document.getElementById('cadastroModal').style.display = 'block';
    }

    function fecharModal() {
        document.getElementById('cadastroModal').style.display = 'none';
    }

    function login() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password-field').value;

        if (!username || !password) {
            exibirModal('Erro', 'Por favor, preencha todos os campos.');
            return false;
        }

        console.log("Username: " + username);
        console.log("Password: " + password);
        return true;
    }
  </script>
<?php
function mostrarEstrelas($nota) {
    $estrelas = "";
    $nota_inteira = intval($nota); 
    // Adiciona estrelas cheias
    for ($i = 0; $i < $nota_inteira; $i++) {
        $estrelas .= "&#9733;";
    }
    if ($nota - $nota_inteira > 0.5) {
        $estrelas .= "&#9733;";
    }
    return $estrelas;
}

$session_timeout = 60; 

if (isset($_SESSION['ACTIVITY']) && (time() - $_SESSION['ACTIVITY'] > $session_timeout)) {

    session_unset();
    session_destroy();
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
}

$_SESSION['ACTIVITY'] = time();

if (isset($_SESSION['nao_autenticado']) && ($_SESSION['nao_autenticado'] == 0)){
  echo "<script>exibirModal('Status da sessão','Voce está logado.')</script>";
}else if(isset($_SESSION['nao_autenticado']) && ($_SESSION['nao_autenticado'] == 1)) {
    echo "<script>exibirModal('Status da sessão','Voce não está logado.')</script>";
  }else {
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
  }
  $servername = "localhost";
  $username = "root";
  $password = "PUC@1234";
  $database = "avalia_acesso_db";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }
  if (isset($_SESSION['login'])){
  $nome_usuario = $_SESSION['login'];
  $senha_u = $_SESSION['senha'];
  $sql = "SELECT Foto FROM usuarios WHERE Nome='$nome_usuario' AND Senha = md5('$senha_u')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avatar_path = $row['Foto'];
  } else {

    $avatar_path = 'caminho/para/imagem_padrao.jpg';
  }
}

  $conn->close();
?>

<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);">
    <div class="container-fluid">
      <div class="navbar-header" style="width: 600px;">
        <button type="button" class="navbar-toggle" style="background-color:#000;  position: absolute;right: 20px;"  data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#" style="color:#000 ;font-size:large;"> Bem-Vindo ao Avalia Acesso <?php if (isset($_SESSION['login'])){ echo ",".$nome_usuario;} ?>!</a>
        <img src="logo.png" id="logo11" alt="Logo" style="width: 50px;"></img>
        <img src="logo.png" id="logo12" alt="Logo" style="width: 50px;"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
        <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['login'])){
        echo '<li id="l1"><img id="i2" src="mostrarimagem.php" alt="" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
        echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '</a></li>';
        echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
      }else{
        echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Voltar </a></li>';
      }
        ?>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">
  <div class="info-container">
    <p class="info-text">Avalia Acesso é um site de informação e pesquisa sobre restaurantes, bares, casas de eventos, shoppings centers, etc. Onde os usuários podem atribuir uma nota geral para o estabelecimento, assim como conceder uma descrição sobre o local para que outros usuários possam ler e avaliar se gostariam de frequentar o local ou não.</p>
    <h2 class="text-center mt-5 mb-4">Como fazer uso do Avalia Acesso?</h2>
    <div class="row">
      <div class="col-md-3 col-sm-6 sequence-step">
        <p>Cadastrar no Site</p>
        <span class="sequence-arrow glyphicon glyphicon-arrow-right"></span>
      </div>
      <div class="col-md-3 col-sm-6 sequence-step">
        <p>Avaliar Estabelecimento</p>
        <span class="sequence-arrow glyphicon glyphicon-arrow-right"></span>
      </div>
      <div class="col-md-3 col-sm-6 sequence-step">
        <p>Visualizar Notas de Estabelecimento</p>
        <span class="sequence-arrow glyphicon glyphicon-arrow-right"></span>
      </div>
      <div class="col-md-3 col-sm-6 sequence-step">
        <p>Pesquisar Estabelecimento por Interesse Pessoal</p>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>
