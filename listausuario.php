<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
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
            top:170px;
            left: -100px;
            width:1500px;
            height:500px;
        }
        .col-ms-4{
            position: absolute;
            top:210px;
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
$session_timeout = 60; 

if (isset($_SESSION['ACTIVITY']) && (time() - $_SESSION['ACTIVITY'] > $session_timeout)) {

    session_unset();
    session_destroy();
    echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
}

$_SESSION['ACTIVITY'] = time();
if ($_SESSION['nao_autenticado'] == 0){
  echo "<script>exibirModal('Status da sessão','Voce está logado.')</script>";

  $servername = "localhost: 3306";
  $username = "root";
  $password = "2606Bst*";
  $database = "avalia_acesso_db";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

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

  // Fecha a conexão
  $conn->close();
?>

<nav class="navbar navbar-inverse" style="height:100px;color: rgb(212, 218, 223);">
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
      <div class="collapse navbar-collapse" id="myNavbar" style="z-index:777;background-color: #f8f7f7;font-size: large;">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php" style="background-color: #f8f7f7;color: #000;">Home</a></li>
          <li><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/infoavaliaacesso.php" class="as" href="#"style="background-color: #f8f7f7;color: #000;">Info - Avalia Acesso</a></li>
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
    <div class="container" style="height: 700px; position: absolute;top: 100px;">              
        </div>
        <div class="inputform" style="background-color:#C4B5B5;width:250px;height:280px;position:absolute;top:145px;left:50px;">
        <img id="i3" src="img//logo.png" alt="" style="width: 100px;"> <!-- Diminuir o tamanho do logo -->  
        <div class="form-header">
            <h1>Filtrar Lista</h1>  
            <input style=" height:26px;width:178px;position: relative;top:170px;left: -60px;" type="text" id="filtro-nome" placeholder="Filtrar por Nome" onkeyup="filtrarTabela('nome')"> 
<input style=" height:26px;width:178px;position: relative;top:120px;left: -240px;" type="text" id="filtro-id" placeholder="Filtrar por ID" onkeyup="filtrarTabela('id')"> 
        </div>
        </div>
       
    <div class="col-md-9 col-ms-4 form">
            <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "2606Bst*";
    $database = "avalia_acesso_db";

// Crie a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Query SQL para selecionar os dados da tabela
$sql = "SELECT ID, Nome, Senha, Foto FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output dos dados em formato de tabela HTML
    echo '<table class="table table-responsive table-bordered table-white">';
echo '<thead>';
echo '<tr>';
echo '<th colspan="11" class=" table-title">Lista de Usuários</th>'; // Título da tabela
echo '</tr>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nome</th>';
echo '<th>Senha</th>';
echo '<th>Foto</th>';
echo '<th>Administrador?</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody id="usuario-list">'; 
    
    // Output dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['ID'] . '</td>';
        echo '<td>' . $row['Nome'] . '</td>';
        echo '<td>' . $row['Senha'] . '</td>';
        echo '<td><img style="width:40px;height:40px;" src="data:image/jpeg;base64,' . base64_encode($row['Foto']) . '"></td>';
        if ($row['Senha']=='3dd73597286742d1e6d317e975afb964'){
          echo '<td style="text-align:center"> <img style="width:40px;height:40px;" src="right.JPG"></img> </td>';
        }else{
          echo '<td style="text-align:center">  <img style="width:40px;height:40px;" src="wrong.JPG"></img> </td>';
        }
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 resultados";
}
$conn->close();
?>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     function filtrarTabela(tipoFiltro) {
    var inputNome = document.getElementById("filtro-nome");
    var inputid = document.getElementById("filtro-id");
    var filterNome = inputNome.value;
    var filterid = inputid.value;
    var table = document.getElementById("usuario-list");
    var tr = table.getElementsByTagName("tr");
    for (var i = 0; i < tr.length; i++) {
        var tdNome = tr[i].getElementsByTagName("td")[1]; // Coluna de Nome
        var tdid = tr[i].getElementsByTagName("td")[0]; // Coluna de ID
        if (tdNome && tdid) {
            var txtValueNome = tdNome.textContent || tdNome.innerText;
            var txtValueid = tdid.textContent || tdid.innerText;
            if (tipoFiltro === 'nome') {
                if (txtValueNome.indexOf(filterNome) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } else if (tipoFiltro === 'id') {

                if (txtValueid.indexOf(filterid) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
    </script>
<?php
} else {
  echo "<script>window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'</script>";
}
?>
</body>
</html>