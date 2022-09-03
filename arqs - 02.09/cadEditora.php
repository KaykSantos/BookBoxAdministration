<?php
include('biblioteca.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de editora</title>
    <link rel="stylesheet" href="style.css">
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
        <div><img src="logo/logoazul.png" alt="logo" height="50px"></div>
        <p>Cadastros</p>
    </header>
    <nav>
        <div class="card">
            <a href="cadUsuario.php">Usu��rio</a>  
        </div>
        <div class="card">
            <a href="cadLivro.php">Livro</a>  
        </div>
        <div class="card">
            <a href="cadGenero.php">G��nero</a>  
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
    
        <h3>Excluir editora:</h3>
        C��digo da editora:<br>
        <input type="number" id="excluirEditora" name="excluirEditora">
        <button name="excluir">Excluir</button>
    </form>
</body>
</html>
<?php
    echo "<div>
            <h3>Editoras cadastradas: </h3>
            <table id='TabMostrarEditora'>
                <tr>
                    <th>C��digo</th>
                    <th>Nome</th>
                </tr>";
                MostrarEditora();
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['editora'])){
            $resultado = CadastrarEditora($_POST['nomeEditora']);
        }else if(isset($_POST['excluir'])){
            $resultado = ExcluirEditora($_POST['excluirEditora']);
        }
    }
?>
