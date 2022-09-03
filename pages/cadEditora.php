<?php
include('../php/biblioteca.php');
     if(isset($_GET['delete'])){
        $cd = (int)$_GET['delete'];
        ExcluirEditora($cd);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de editora</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    #TabMostrarEditora{
        margin: 0;
        border: 1px solid black;
        border-collapse: collapse;
    }
    #TabMostrarEditora th{
        width: 70px;
        border: 1px solid black;
        margin: 0;
    }
</style>
</head>
<body id="bodyAdm">
    <header>
        <div><img src="../imgs/logo/logoazul.png" alt="logo" height="50px"></div>
        <p>Cadastros</p>
    </header>
    <nav>
        <div class="card">
            <a href="homeUser.html">Acervo</a>  
        </div>
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
    <form action="" method="post" id="novaEditora">
        <h3>Cadastrar editora</h3>
        Nome: <br>
        <input type="text" id="nomeEditora" name="nomeEditora"><br><br>
        <button  name="editora">Cadastrar </button>
    </form>
</body>
</html>
<?php
    echo "<div>
            <h3>Editoras cadastradas: </h3>
            <table id='TabMostrarEditora'>
                <tr>
                    <th>Código</th>
                    <th>Editora</th>
                    <th>Excluir</th>
                </tr>";
                MostrarEditora(0);
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['editora'])){
            $resultado = CadastrarEditora($_POST['nomeEditora']);
        }
    }
?>
