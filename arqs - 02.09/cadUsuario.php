<?php
include('biblioteca.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
    <link rel="stylesheet" href="style.css">
    <style>
    #TabMostrarUsuario{
        margin: 0;
        border: 1px solid black;
        border-collapse: collapse;
    }
    #TabMostrarUsuario th{
        width: 70px;
        border: 1px solid black;
        margin: 0;
    }
</style>
</head>
<body id="bodyAdm">
    <header>
        <div><img src="logo/logoazul.png" alt="logo" height="50px"></div>
        <p>Cadastros</p>
    </header>
    <nav>
        <div class="card">
            <a href="cadUsuario.php">Usuário</a>  
        </div>
        <div class="card">
            <a href="cadLivro.php">Livro</a>  
        </div>
        <div class="card">
            <a href="cadGenero.php">Gênero</a>  
        </div>
        <div class="card">
            <a href="cadEditora.php">Editora</a>  
        </div>
        <div class="card">
            <a href="cadAutor.php">Autor</a>  
        </div>
    </nav>
    <form action="" method="post" id="novoUsuario">
        <h3>Cadastrar usuário</h3>
        <input type="text" name="rm" id="rm" placeholder="Digite o rm: ">
        <input type="text" name="nome" id="nome" placeholder="Digite o nome: ">
        <input type="email" name="email" id="email" placeholder="Digite o email: ">
        <input type="password" name="senha" id="senha" placeholder="Digite a senha:">
        <input type="text" name="userStatus" id="userStatus" placeholder="Status:">
        <label for="adm">Administrador</label>
        <select name="adm" id="adm">
          <option value="0">Sim</option>
          <option value="1">Não</option>
        </select>
        <button name="usuario">Cadastrar</button>

        <h3>Excluir usuário</h3>
        RM do usuário<br>
        <input type="number" id="excluirUsuario" name="excluirUsuario">
        <button name="excluir">Excluir</button>
    </form>
</body>
</html>
<?php
    echo "<div>
            <h3>Usuários cadastrados: </h3>
            <table id='TabMostrarUsuario'>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>";
                MostrarUsuario();
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['usuario'])){
            $resultado = CadastrarUsuario($_POST['rm'],$_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['userStatus'],$_POST['adm']);
        }else if(isset($_POST['excluir'])){
            $resultado = ExcluirUsuario($_POST['excluirUsuario']);
        }
    }
?>
