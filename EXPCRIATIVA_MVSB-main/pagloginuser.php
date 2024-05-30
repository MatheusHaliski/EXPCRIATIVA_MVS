<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Avalia Acesso</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="login.component.css">
<style>
    .toggle-password {
        cursor: pointer;
    }
    a{
        color: black;
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
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
$_SESSION['nao_autenticado'] = true;
if (isset($_SESSION['recem-cadast']) && $_SESSION['recem-cadast']) {
    echo "<script>";
    echo "exibirModal('Confirmação de Cadastro', 'Seu cadastro foi realizado com sucesso!');";
    echo "</script>";
    unset($_SESSION['recem-cadast']); // Resetar a variável de sessão após exibir o modal
}
else{
    if ((isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']==false) && isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] ) {
        unset($_SESSION['mensagem']);
        if($_SESSION['naoadm']==true){
            echo "<script>exibirModal('Erro', 'Sem permissão de administrador: Voltou para tela de login.');</script>";
            unset($_SESSION['naoadm']);
        }else{
        echo "<script>exibirModal('Erro', 'Fim da sessão: Voltou para tela de login.');</script>";}
        session_destroy();
        session_start();
        unset($_SESSION['mensagem']);
    }
    else if (isset($_SESSION['recem-cadast']) && !$_SESSION['recem-cadast']) {
        echo "<script>";
        echo "exibirModal('Erro no Cadastro', '{$_SESSION['mensagem']}');";
        echo "</script>";
        unset($_SESSION['recem-cadast']); // Resetar a variável de sessão após exibir o modal
    }
    
    else if((isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']==true) ){
        unset($_SESSION['mensagem']);
        session_destroy();
        echo "<script>exibirModal('Erro', 'Login ou senha incorreto.');</script>";
        session_start();
        unset($_SESSION['mensagem']);
    }}
 
$_SESSION['nao_autenticado'] = true;
?>
<div class="img js-fullheight" style="background-image:url(assets/bd6.jpg);width:device-width;height:1000px;">
    <div style="width:device-width;height:1000px; background-color: rgba(124, 118, 118, 0.521);">
        <section class="ftco-section" style="position: relative; z-index: 1;">
            <div class="container">
                    
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <img id="i3" style="width: 110px;height: 90px;" src="logo.png" alt="" >
                        <h2 class="heading-section" style="font-size: xx-large;">Bem-Vindo ao Avalia Acesso!</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Possui conta?</h3>
                            <form action="http://localhost/EXPCRIATIVA_MVSB-MAIN/login.php" method="POST" id="loginForm" class="signin-form" onsubmit="return login()">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password"  name="password" class="form-control" placeholder="Password">
                                    <span class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePasswordVisibility()"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" >Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p style= "color:#ffff" class=" text-center"> Não possui conta? </p>
                            <div class="social d-flex text-center">
                                <a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/pagcadastrousuario.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Cadastre-se</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
