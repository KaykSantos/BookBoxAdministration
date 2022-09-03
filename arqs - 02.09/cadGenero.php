<?php
include('biblioteca.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de gênero</title>
    <link rel="stylesheet" href="style.css">
    <style>
    #TabMostrarGenero{
        margin: 0;
        border: 1px solid black;
        border-collapse: collapse;
    }
    #TabMostrarGenero th{
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
    <form action="" method="post" id="novoGenero">
        <h3>Cadastrar gênero</h3>
        Nome: <br>
        <input type="text" id="nomeGenero" name="nomeGenero"><br><br>
        <button  name="genero">Cadastrar</button>
        
        <h3>Excluir gênero</h3>
        Código do gênero:<br>
        <input type="number" id="excluirGenero" name="excluirGenero">
        <button name="excluir">Excluir</button>
</form>
</body>
</html>
<?php
    echo "<div>
            <h3>Gêneros cadastrados: </h3>
            <table id='TabMostrarGenero'>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                </tr>";
                MostrarGenero();
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['genero'])){
            $resultado = CadastrarGenero($_POST['nomeGenero']);
        }else if(isset($_POST['excluir'])){
            $resultado = ExcluirGenero($_POST['excluirGenero']);
        }
    }
?>
