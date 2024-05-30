<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
       .navbar-header{
            width: fit-content;
       }
        .col-md-9{
            position: absolute;
            top:0px;
            left: 900px;
            width:fit-content;
            height:100%;
        }
        .col-ms-4{
            position: absolute;
            top:30px;
            left: 300px;
            width:auto;
            height:auto;
        }
        .form-image{
            position: absolute;
            left: 140px;
            top:0px;
            width:60%;
        }
        @media (min-width: 768px) {
            #logo11{
                display:none;
            }
            #myNavbar{
                height:100px;
        }
    }
        @media (max-width: 768px) {

            #logo12{
                display:block;
            }
      #l1,#l2,#i1,#i2{
        display:none;
      }
      #l3{
        position: relative;
        left:25px;
      }
            .form-image {
                position: absolute;
                width: 80%;
                left: 110px;
                top: 0px;
            }
            #myNavbar{
                color: wheat;
                z-index:999;
                position: absolute;
                top: 30px;
                left:320px;
                
            }
            .navbar-header{
            background-color: #f8f7f7;
            color: wheat;
            position: absolute;
            left: 10px;
            width: 100%;
            height:100%;
       }
       .navbar-brand{
            color: #f8f7f7;;
       }
       .navbar-inverse{
        height:100px;
       }
       .container-fluid{
            width: fit-content;
            height:100%;
       }
            nav{
                width:fit-content;
            }
            .form {
                width: auto;
                left: 80px;
                top: 0px;
        }
        .col-md-9 {
            width:auto;
        }
        #error-messages{
            position: absolute;
            top:370px;
            left: 0px;
        }
    }
      /* Estilo para centralizar o modal */
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

    </style>
</head>
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

    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password-field');
        var fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    }
</script>
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

if (isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] == 0){
  echo "<script>exibirModal('Status de sessão', 'Você está logado');</script>";
} 
  // Conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "PUC@1234";
  $database = "avalia_acesso_db";

  $conn = new mysqli($servername, $username, $password, $database);

  // Verifica conexão
  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

  // Consulta SQL para obter o caminho da imagem do usuário
  if(isset($_SESSION['login'])){
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
  // Fecha a conexão
  $conn->close();
?>

<nav class="navbar navbar-inverse" >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" style="background-color:#000;  position: absolute;right: 0px;"  data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <?php
if (isset($nome_usuario)) {
    echo '<a class="navbar-brand" href="#" style="color:#000 ;font-size:large;"> Bem-Vindo ao Avalia Acesso, ' . $nome_usuario . '!</a>';
}
if (isset($nome_usuario)) {
        echo '<img src="mostrarimagem.php" id="logo11" alt="Logo" style="width: 50px;"></img>';
}
?> 
        <img src="logo.png" id="logo12" alt="Logo" style="width: 50px;"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php" style="background-color: #f8f7f7;color: #000;">Home</a></li>
          <li><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/infoavaliaacesso.php" class="as" href="#"style="background-color: #f8f7f7;color: #000;">Info - Avalia Acesso</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($nome_usuario)) {
        echo '<li id="l1"><img id="i2" src="mostrarimagem.php" alt="" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
        echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '!</a></li>';
        }
        echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
        ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container" style="height: 850px; position: relative;top: -20px;">
        <div class="row">
            <div class="col-md-9 col-ms-4 form-image" style="background-color: #686E6E;width:20%;height:100%;">
                <img id="i3" src="img//logo.png" alt="" style="width: 100px; position: relative;right: 40px;"> <!-- Diminuir o tamanho do logo -->
                <div id="error-messages" style="background-color: rgb(247, 243, 243);"></div> <!-- Div para exibir os erros -->
            </div>
            <div class="col-md-9 col-ms-4 form">
                <form action='http://localhost/EXPCRIATIVA_MVSB-MAIN/cadastro.php' enctype="multipart/form-data" method="POST"   id="registration-form" onsubmit="return validateForm()">
                    <div class="form-header">
                        <div class="title">
                            <h1 class="text-center">Cadastre-se</h1>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Primeiro Nome</label>
                                    <input id="nome"  type="text" class="form-control" name="nome" placeholder="Digite seu primeiro nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Sobrenome</label>
                                    <input id="sobrenome" type="text" class="form-control" name="sobrenome" placeholder="Digite seu sobrenome" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu e-mail" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Celular</label>
                                    <input id="celular" type="tel" class="form-control" name="celular" placeholder="(xx) xxxx-xxxx" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="avatar">Foto de Perfil</label>
                        <input type="file" name="avatar">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input id="senha" type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="usuarioadm">Selecione o tipo de usuário:</label>
                <select id="usuarioadm" class="form-control" name="usuarioadm" required>
                    <option value="1">Administrador</option>
                    <option value="0">Comum</option>
                </select>
            </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" placeholder="Digite sua senha novamente" required>
                    </div>
                </div>
                    </div>

                    <div class="col-md-12 gender-inputs">
                        <div class="gender-title">
                            <h6 style="font-size: large;">Gênero</h6>
                        </div>
                        <div class="gender-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group2">
                                        <input id="female" type="radio" class="form-check-input" value="Feminino" name="gender" required>
                                        <label for="female" class="form-check-label">Feminino</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group2">
                                        <input id="others" type="radio" class="form-check-input" value="Outros" name="gender">
                                        <label for="others" class="form-check-label">Outros</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group2">
                                        <input id="male" type="radio" class="form-check-input" value="Masculino"name="gender">
                                        <label for="male" class="form-check-label">Masculino</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group2">
                                        <input id="none" type="radio" class="form-check-input" value="NULL" name="gender">
                                        <label for="none" class="form-check-label" style="font-size: small;">Prefiro não dizer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="continue-button text-center" style="height:26px;position: relative;top: -26px;">
                        <button type="submit" class="btn btn-primary" >Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
         var email = document.getElementById("email");
    var number = document.getElementById("celular");
    var password = document.getElementById("senha");
    var confirmPassword = document.getElementById("confirmPassword");
    var firstName = document.getElementById("nome");
    var lastName = document.getElementById("sobrenome");

    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var numberPattern = /^\(\d{2}\) \d{4}-\d{4}$/;
    var namePattern = /^[a-zA-ZÀ-ÖØ-öø-ÿ]{5,}$/; // Pelo menos 2 letras (incluindo letras acentuadas)
        document.getElementById("nome").addEventListener("input", function() {
    this.setCustomValidity(namePattern.test(this.value) ? '' : 'Por favor, insira um primeiro nome válido (pelo menos 5 letras).');
});

document.getElementById("sobrenome").addEventListener("input", function() {
    this.setCustomValidity(namePattern.test(this.value) ? '' : 'Por favor, insira um sobrenome válido (pelo menos 5 letras).');
});

document.getElementById("email").addEventListener("input", function() {
    this.setCustomValidity(emailPattern.test(this.value) ? '' : 'Por favor, insira um email válido.Está faltando o "@".');
});

document.getElementById("celular").addEventListener("input", function() {
    this.setCustomValidity(numberPattern.test(this.value) ? '' : 'Por favor, insira um número de celular válido no formato: (xx) xxxx-xxxx');
});

document.getElementById("senha").addEventListener("input", function() {
    var confirmPassword = document.getElementById("confirmPassword");
    this.setCustomValidity(this.value === confirmPassword.value ? '' : 'As senhas digitadas não coincidem.');
    confirmPassword.dispatchEvent(new Event("input"));
});

document.getElementById("senha").addEventListener("input", function() {
    var confirmPassword = document.getElementById("confirmPassword");
    var senha = this.value;
    var isAdminPassword = senha === "FDF365";
    if (isAdminPassword || senha.length >= 6) {
        this.setCustomValidity("");
    } else {
        this.setCustomValidity("A senha deve ter no mínimo 6 caracteres.");
    }
    confirmPassword.dispatchEvent(new Event("input"));
});


document.getElementById("confirmPassword").addEventListener("input", function() {
    var password = document.getElementById("senha");
    this.setCustomValidity(this.value === password.value ? '' : 'As senhas digitadas não coincidem.');
});

     function validateForm() {
    return true;
}


    </script>
</body>
</html>