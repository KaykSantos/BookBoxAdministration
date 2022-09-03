<?php
include('biblioteca.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de autor</title>
    <link rel="stylesheet" href="style.css">
    <style>
    #TabMostrarAutor{
        margin: 0;
        border: 1px solid black;
        border-collapse: collapse;
    }
    #TabMostrarAutor th{
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
            <a href="cadUsuario.php">Usu¨¢rio</a>  
        </div>
        <div class="card">
            <a href="cadLivro.php">Livro</a>  
        </div>
        <div class="card">
            <a href="cadGenero.php">G¨ºnero</a>  
        </div>
        <div class="card">
            <a href="cadEditora.php">Editora</a>  
        </div>
        <div class="card">
            <a href="cadAutor.php">Autor</a>  
        </div>
    </nav>
    <form action="" method="post" id="novoAutor">
        <h3>Cadastrar autor</h3>
        Nome: <br>
        <input type="text" id="nomeAutor" name="nomeAutor"><br><br>
        <button name="autor">Cadastrar</button>
    
        <h3>Excluir autor:</h3>
        C¨®digo do autor<br>
        <input type="number" id="excluirAutor" name="excluirAutor">
        <button name="excluir">Excluir</button>
</form>
</body>
</html>

<?php
    echo "<div>
            <h3>Autores cadastrados: </h3>
            <table id='TabMostrarAutor'>
                <tr>
                    <th>C¨®digo</th>
                    <th>Nome</th>
                </tr>";
                MostrarAutor();
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['autor'])){
            $resultado = CadastrarAutor($_POST['nomeAutor']);
        }else if(isset($_POST['excluir'])){
            $resultado = ExcluirAutor($_POST['excluirAutor']);
        }
    }
?>
