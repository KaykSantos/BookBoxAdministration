<?php
include('biblioteca.php');
  if($_POST){
    $resultado = Login($_POST['login'], $_POST['senha'], "");
    if($resultado['erro']){
      echo "Usuário e/ou senha inválido!!";
    } else{
        $user = $resultado['dados'];
        if($user->user_status == 'bloqueado'){
          echo 'Usuário bloqueado.';
        } else{
          if($user->adm ==0){
            $user = $resultado['dados'];
            $_SESSION['rm'] = $user->rm;
            $_SESSION['nome'] = $user->nome;
            $_SESSION['email'] = $user->email;
            $_SESSION['senha'] = $user->senha;
            $_SESSION['perfil'] = $user->perfil;
            $_SESSION['user_status'] = $user->user_status;
            $_SESSION['adm'] = $user->adm;
            header('location: homeAdm.html');
            echo " sua mãe";
              
          } else{
            header('location: homeUser.html');
          }
        }
    }
  }
?>

<!--
<form id="entrar" method="post" autocomplete="off">
    Usuário:
    <input class="inputmain" type= "email" id="login" name="login" placeholder="Login">
    <BR>
    Senha:
    <input class="inputmain" type="password" id="senha" name="senha" placeholder="Senha">
    <br>
    <button type="submit"> Entrar</button>
</form> 
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="body-login">
    <main id="mainLogin">
        <section class="area-login">
            <div class="login"> <!-- Principal -->
                <div class="logo">
                    <img src="logo/logoazul.png" alt="Logo do projeto">
                </div>
                <form id="entrar" method="post" autocomplete="off">
                    <input class="inputmain" type= "email" id="login" name="login" placeholder="Login">
                    <input class="inputmain" type="password" id="senha" name="senha" placeholder="Senha">
                    <button type="submit"> Entrar</button>
                </form>
                <p><a id="esque" href="#">Esqueceu a senha?</a></p>
            </div>
        </section>
    </main>
</body>
</html>
