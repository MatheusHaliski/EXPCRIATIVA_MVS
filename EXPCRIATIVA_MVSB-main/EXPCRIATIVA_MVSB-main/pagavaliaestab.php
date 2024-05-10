<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Avalia Estab</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #input-nome {
    height: 34px; 
    border: 1px solid #ccc;
    border-radius: 4px; 
    padding: 6px 12px; 
    color: #555; 
    background-color: #fff; 
    margin-bottom: 15px; 
    width: 100%; 
    box-sizing: border-box; 
}
#descricao {
    width:300px;
    height: 150px; 
    resize: vertical; 
    overflow-y: auto; 
    white-space: pre-wrap; 
    word-wrap: break-word; 
}

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
            top:0px;
            left: 300px;
            width:auto;
            height:100%;
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
    <script>
    function exibirModal(titulo, mensagem) {
        document.getElementById('modalTitulo').innerText = titulo;
        document.getElementById('modalMensagem').innerText = mensagem;
        document.getElementById('cadastroModal').style.display = 'block';
    }

    function fecharModal() {
        document.getElementById('cadastroModal').style.display = 'none';
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
// Set session timeout (in seconds)
$session_timeout = 60; // 1 minute

// Check if session is expired
if (isset($_SESSION['ACTIVITY']) && (time() - $_SESSION['ACTIVITY'] > $session_timeout)) {

    // Session expired, destroy session and redirect to login page
    session_unset();
    session_destroy();
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
}

$_SESSION['ACTIVITY'] = time();

if (($_SESSION['nao_autenticado'] == 0)){
  echo "<script>exibirModal('Status da sessão','Voce está logado.')</script>";

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
  $nome_usuario = $_SESSION['login'];
  $senha_u = $_SESSION['senha'];
  $sql = "SELECT Foto FROM usuarios WHERE Nome='$nome_usuario' AND Senha = md5('$senha_u')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avatar_path = $row['Foto'];
  } else {
    // Se não houver caminho de imagem no banco de dados, use um padrão
    $avatar_path = 'caminho/para/imagem_padrao.jpg';
  }

  // Fecha a conexão
  $conn->close();
?>
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
<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);">
    <div class="container-fluid">
      <div class="navbar-header" style="width: 600px;">
        <button type="button" class="navbar-toggle" style="background-color:#000;  position: absolute;right: 0px;"  data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#" style="color:#000 ;font-size:large;"> Bem-Vindo ao Avalia Acesso, <?php echo $nome_usuario; ?>!</a>
        <img src="mostrarimagem.php" id="logo11" alt="Logo" style="width: 50px;"></img>
        <img src="logo.png" id="logo12" alt="Logo" style="width: 50px;"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php" style="background-color: #f8f7f7;color: #000;">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #f8f7f7;color: #000;">Info - Site<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-1</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-2</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-3</a></li>
            </ul>
          </li>
          <li><a class="as" href="#"style="background-color: #f8f7f7;color: #000;">Info - Avalia Acesso</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
        echo '<li id="l1"><img id="i2" src="mostrarimagem.php" alt="" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
        echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '!</a></li>';
          echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
        ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container" style="height: 700px; position: relative;top: -20px;">
        <div class="row">
            <div class="col-md-9 col-ms-4 form-image" style="background-color: #686E6E;width:20%;height:100%;">
                <img id="i3" src="img//logo.png" alt="" style="width: 100px; position: relative;right: 40px;"> <!-- Diminuir o tamanho do logo -->
                <div id="error-messages" style="background-color: rgb(247, 243, 243);"></div> <!-- Div para exibir os erros -->
            </div>
            <div class="col-md-9 col-ms-4 form ">
            <form action="http://localhost/EXPCRIATIVA_MVSB-MAIN/adicionalista.php" method="POST" id="registration-form">
    <div class="form-header">
        <div class="title">
            <h1 class="text-center">Avalie seu Estabelecimento</h1>
        </div>
    </div>

    <div class="input-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="nome">Nome do Estabelecimento</label>
    <select id="input-nome" name="nome" required>
        <option value="">Selecione o Estabelecimento</option>
        <?php
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

        // Consulta SQL para obter os nomes dos estabelecimentos
        $sql = "SELECT Nome FROM estabelecimentos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Preenche o menu suspenso com os nomes dos estabelecimentos
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhum estabelecimento encontrado</option>";
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" placeholder="Descrição..." required></textarea>
                </div>
            </div>
        </div>
        <div class="form-header">
            <h1 style="font-size:x-large;">Nota Geral do Estabelecimento</h1>
    </div>
        <div class="form-group" style="position:relative;left:70px;">
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="1" required data-label="1"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="2" data-label="2"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="3" data-label="3"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="4" data-label="4"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="5" data-label="5"> </label>
                            <strong style="width:10px;position:absolute;left:180px;bottom:-20px;">muito bom </strong>
                            <strong style="width:10px;position:absolute;left:-50px;bottom:-20px;">muito ruim </strong>
                        </div>
        <button type="submit" class="btn btn-primary" style="position: relative;top: 20px;">Confirmar</button>
    </div>
</form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

    var nome = document.getElementById("nome");
    var endereco = document.getElementById("endereco");
    var cnpj = document.getElementById("cnpj");
    var descricao = document.getElementById("descricao");

    var namePattern = /^[a-zA-ZÀ-ÖØ-öø-ÿ]{5,}$/; // Pelo menos 2 letras (incluindo letras acentuadas)
    var cnpjPattern = /^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/;
    var enderecoPattern = /[a-zA-ZÀ-ÖØ-öø-ÿ]/; // Pelo menos uma letra (incluindo letras acentuadas)

    document.getElementById("nome").addEventListener("input", function() {
        this.setCustomValidity(namePattern.test(this.value) ? '' : 'Por favor, insira um nome válido (pelo menos 5 letras).');
    });

    document.getElementById("endereco").addEventListener("input", function() {
        this.setCustomValidity(enderecoPattern.test(this.value) ? '' : 'Por favor, insira um endereço válido.');
    });

    document.getElementById("cnpj").addEventListener("input", function() {
        this.setCustomValidity(cnpjPattern.test(this.value) ? '' : 'Por favor, insira um CNPJ válido.');
    });

    document.getElementById("descricao").addEventListener("input", function() {
        this.setCustomValidity(this.value.length > 0 ? '' : 'Por favor, insira uma descrição.');
    });


    document.getElementById("senha").addEventListener("input", function() {
        var confirmPassword = document.getElementById("confirmPassword");
        this.setCustomValidity(this.value === confirmPassword.value ? '' : 'As senhas digitadas não coincidem.');
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
<script>
    // Função para atualizar o valor do input com o nome do estabelecimento selecionado
    function atualizarNome() {
        var select = document.getElementById("input-nome"); // Obtém o elemento select
        var inputNome = document.getElementById("nome"); // Obtém o input para o nome do estabelecimento

        // Define o valor do input com o valor da opção selecionada
        inputNome.value = select.value;
    }

    // Adiciona um listener para o evento "change" no select
    document.getElementById("input-nome").addEventListener("change", atualizarNome);

    // Chama a função de atualização uma vez para definir o valor inicial do input
    atualizarNome();
</script>

<?php
} else {
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
}
?>
</body>
</html>
