<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleB.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
      .hidden {
    display: none; /* Oculta a coluna */
}
.table-responsive {
        display: block;
        overflow-x: auto;
        overflow-y: auto; /* Adiciona scroll vertical */
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        width: 100%; 
    max-height:500px;
    overflow-x: auto; /* Adiciona scroll horizontal se necessário */
    white-space: nowrap; /* Evita que o conteúdo da tabela seja quebrado */
    position: absolute;
    top: -20px; /* Posiciona a tabela abaixo do filtro */
    }
        .table{
            width:auto;
            position: absolute;
            top:0px;
            left:0px;      
        }
       .navbar-header{
            width: fit-content;
       }
        .col-md-9{
            position: absolute;
            top:60px;
            left: -100px;
            width:1500px;
            height:auto;
        }
        .col-ms-4{
            position: absolute;
            top:60px;
            left: 350px;
            width:500px;
            height:auto;
        }
        .form-image{
            position: absolute;
            left: 210px;
            top:90px;
            width:60%;
        }
        .table-white {
        background-color: white;
        color: black;
    }
    
    .table-title {
        background-color: #000000; /* Cor preta */
        color: white; /* Texto branco */
        font-size: 18px; /* Tamanho da fonte */
        text-align: center; /* Alinhamento centralizado */
        padding: 10px; /* Espaçamento interno */
    }@media (min-width: 768px) {
            #logo11{
                display:none;
            }
        }
        @media (max-width: 768px) {
            #logo12{
                display:none;
            }
            .container{
                width:1400px;
            }
            #l1,#l2{
        display:block;
        position: relative;
        left:10px;
        height:10px;
      }
      #l2{
        display:block;
        position: relative;
        left:110px;
        height:10px;
      }
      #i1{
        display:block;
        position: relative;
        top:900px;
        left:10px;
      }
      #l3{
        position: relative;
        left:35px;
        top:35px;
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
.table {
        position:relative;
        top:260px;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .table-responsive {
        display: block;
        overflow-x: auto;
        overflow-y: auto; /* Adiciona scroll vertical */
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        width: calc(100% - 350px); /* Ajusta a largura da tabela responsiva */
    max-width: none; /* Remove a largura máxima para permitir que a tabela ocupe o espaço disponível */
    max-height:500px;
    overflow-x: auto; /* Adiciona scroll horizontal se necessário */
    white-space: nowrap; /* Evita que o conteúdo da tabela seja quebrado */
    position: absolute;
    top: -30px; /* Posiciona a tabela abaixo do filtro */
    left: 30px; /* Alinha a tabela com o filtro */
    }
  /* Ajustes de margem para telas menores */
  .container {
        margin-left: 0;
        margin-right: 0;
        padding-left: 0;
        padding-right: 0;
    }
     /* Ajustes de tamanho para elementos dentro da div .container */
     .form-image {
        width: 80%;
    }
#id3{
  position: relative;
  left:0px;
}
    .inputform {
      width: 400px;
        height: 150px;
        position: absolute;
        top: -10px; /* Ajuste conforme necessário */
        left: 130px; /* Ajuste conforme necessário */
    }

    .col-md-9 {

        width: 100%;
        left: 0;
    }

    .col-ms-4{
            background-color:#686E6E;
            position: absolute;
            top:160px;
            left: 310px;
            width:300px;
            height:auto;
        }
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.table {
    width: 100%;
    max-width: 100%; /* Define a largura máxima da tabela */
    overflow-x: auto; /* Adiciona scroll horizontal se necessário */
}

.table-title {
    background-color: #000000; /* Cor preta */
    color: white; /* Texto branco */
    font-size: 18px; /* Tamanho da fonte */
    text-align: left; /* Alinhamento centralizado */
    padding: 10px; /* Espaçamento interno */
}

/* Estilos para a página */
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
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
</script>
<?php
function mostrarEstrelas($nota) {
  $estrelas = "";
  $nota_inteira = intval($nota); 

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
    echo "<script>exibirModal('Status da sessão','Você está logado.')</script>";
} else {
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
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

// Consulta SQL para obter a lista de usuários
$sql = "SELECT ID, Nome_Estabelecimento,Descricao,NotaGeral FROM estabelecimentos_avaliados";
$result = $conn->query($sql);

$estabs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $estabs[] = $row;
    }
}

// Fecha a conexão
$conn->close();
?>

<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);">
    <div class="container-fluid">
        <div class="navbar-header" style="width: 600px;">
            <button type="button" class="navbar-toggle" style="background-color:#000; position: absolute;right: 0px;" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#000 ;font-size:large;"> Bem-Vindo ao Avalia Acesso, <?php echo $_SESSION['login']; ?>!</a>
            <img src="mostrarimagem.php" id="logo11" alt="Logo" style="width: 50px;"></img>
            <img src="logo.png" id="logo12" alt="Logo" style="width: 50px;"></img>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php" style="background-color: #f8f7f7;color: #000;">Home</a></li>
                <li><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/infoavaliaacesso.php" class="as" style="background-color: #f8f7f7;color: #000;">Info - Avalia Acesso</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                echo '<li id="l1"><img id="i2" src="mostrarimagem.php" alt="" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
                echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '!</a></li>';
                echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php"> Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img/logout.JPG"></img></li>';
                ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="z-index:23; height: 1300px; position: relative;top: -20px;">
    <div class="row">
        <div class="col-md-12 col-ms-12 form-image" style="background-color: #686E6E;width: 100%;height:auto;">
            <img id="i3" src="img/logo.png" alt="" style="width: 100px; position: relative;left: -740px;">
            <div id="error-messages" style="background-color: rgb(247, 243, 243);"></div>
        </div>
        <div class="col-md-9 col-ms-4 form">
            <h1 class="text-center">Excluir Avaliação</h1>
            <?php if (count($estabs) > 0): ?>
            <table class="table table-responsive table-bordered table-white">
                <thead>
                    <tr>
                    <th>Excluir</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>NotaGeral</th>
                    </tr>
                </thead>
                <tbody id="usuario-list">
                    <?php foreach ($estabs as $estab): ?>
                    <tr>
                    <td>
                            <form action="http://localhost/EXPCRIATIVA_MVSB-MAIN/excluirestab.php" method="POST" style="display:inline;">
                                <input type="hidden" name="ID" value="<?php echo $estab['ID']; ?>">
                                <input type="hidden" name="Nome_Estabelecimento" value="<?php echo $estab['Nome_Estabelecimento']; ?>">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td><?php echo $estab['ID']; ?></td>
                        <td><?php echo $estab['Nome_Estabelecimento']; ?></td>
                        <td><?php echo $estab['Descricao']; ?></td>
                        <td><?php echo mostrarEstrelas($estab['NotaGeral']) ?></td>;
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhum ESTAB encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
     function filtrarTabela(tipoFiltro) {
    var inputNome = document.getElementById("filtro-nome");
    var inputEstrelas = document.getElementById("filtro-estrelas");
    var filterNome = inputNome.value.toUpperCase();
    var filterEstrelas = inputEstrelas.value;
    var table = document.getElementById("estabelecimentos-list");
    var tr = table.getElementsByTagName("tr");
    for (var i = 0; i < tr.length; i++) {
        var tdNome = tr[i].getElementsByTagName("td")[1]; // Coluna de Nome
        var tdEstrelas = tr[i].getElementsByTagName("td")[6]; // Coluna de Estrelas
        if (tdNome && tdEstrelas) {
            var txtValueNome = tdNome.textContent || tdNome.innerText;
            var txtValueEstrelas = tdEstrelas.textContent || tdEstrelas.innerText;
            if (tipoFiltro === 'nome') {
                if (txtValueNome.toUpperCase().indexOf(filterNome) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } else if (tipoFiltro === 'estrelas') {

                if (txtValueEstrelas.indexOf(filterEstrelas) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
function converterEstrelasParaNumero(estrelas) {
    numero_estrelas = substr_count(estrelas, "&#9733;");
    return numero_estrelas;
}
    </script>
</body>
</html>
