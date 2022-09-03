<?php
include('../php/biblioteca.php');
if(isset($_GET['delete'])){
    $cd = (int)$_GET['delete'];
    ExcluirLivro($cd);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livro</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    #TabMostrarLivro{
        margin: 0;
        border: 1px solid black;
        border-collapse: collapse;
    }
    #TabMostrarLivro th{
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
    <h3>Cadastrar livro</h3>
    <form action="" method="post" class="form" name="autor">
        <input type="text" name="titulo" id="titulo" placeholder="Digite o título do livro: ">
        <label for="ano">Ano do livro:</label>
        <input type="date" name="ano" id="ano">
        <input type="text" name="classificacao" id="classificacao" placeholder="Classificação do livro:">
        <input type="text" name="estado" id="estado" placeholder="Digite o estado do livro:">
        <input type="text" name="editora" id="editora" placeholder="Digite o código da editora:"><br><br>
        <input type="text" name="genero" id="genero" placeholder="Digite o código do gênero:">
        <input type="text" name="isbn" id="isbn" placeholder="ISBN do livro:">
        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade de livros:">
        <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse do livro:">
        <input type="text" name="capa" id="capa" placeholder="Link da capa do livro:">
        <button name="livro">Cadastrar</button>
    </form>
</body>
</html>
<?php
    echo "<div>
            <h3>Livros cadastrados: </h3>
            <table id='TabMostrarLivro'>
                <tr>
                    <th>Código</th>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Classificação</th>
                    <th>Sinopse</th>
                    <th>Editora</th>
                    <th>Genero</th>
                    <th>Quantidade</th>
                    <th>Estado</th>
                    <th>Excluir</th>
                </tr>";
                MostrarLivro(0);
    echo "</table>
        </div>";

    if($_POST){
        if(isset($_POST['livro'])){
            $resultado = CadastrarLivro($_POST['isbn'],$_POST['titulo'],$_POST['ano'],$_POST['quantidade'],$_POST['sinopse'],$_POST['classificacao'],$_POST['editora'],$_POST['genero'],$_POST['estado'], $_POST['capa']);
        }
    }
?>
