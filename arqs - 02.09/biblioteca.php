<?php
  header("Access-Control-Allow-Origin: *");
  session_start();
  $user = 'devjekvf_user';
  $pass = 'niohectmuckz';
  $banco = 'devjekvf_biblioteca';
  $server = 'localhost';
  $conn = new mysqli($server, $user, $pass, $banco);
  if(!$conn){
    echo "Erro de conexão ".$conn->error;
  }

  /* Metodos do CRUD do Administrador */
  function Login($email, $senha, $tipo){
      $sql = 'SELECT * FROM usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'"';
      $res  = $GLOBALS['conn']->query($sql);
      if($res->num_rows > 0){
          $retorno['erro'] = false;
          $user = $res->fetch_object();
          $retorno['dados'] = $user;
      } else{
          $retorno ['erro'] = true;
      }
      /*Mudança de "return" para "echo"*/
      if($tipo == 'json'){
          echo json_encode($retorno);
      }else{
          return $retorno;
      }
        
      /*if($tipo == 'json')
        return json_encode($retorno);
      else 
        return $retorno;*/
  }
  function CadastrarUsuario($rm,$nome,$email,$senha,$userstatus,$adm){
      $sql = 'INSERT INTO usuario(rm, nome, email, senha, user_status, adm) VALUES ('.$rm.',"'.$nome.'","'.$email.'","'.$senha.'","'.$userstatus.'","'.$adm.'")';
      $destino = 'usuario/fotos/'.$rm;
      if (is_dir($destino)){
          mkdir($destino, 0777);
      }
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Usuário cadastrado com sucesso!";
      }else{
        echo "Erro ao cadastrar";
      }
  }
  function MostrarUsuario(){
    $query = "SELECT rm, nome, email FROM usuario";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function ExcluirUsuario($rm){
      $sql = 'DELETE FROM usuario WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);

      if($res)
        echo "Excluído com sucesso!";
      else 
        echo "Erro ao excluir";
  }
  function AtualizarUsuario($rm,$nome,$nasc,$gen,$tel){
      $sql = 'UPDATE usuario SET nome = "'.$nome.'",dt_nascimento = "'.$nasc.'", genero = "'.$gen.'", telefone = "'.tel.'" WHERE rm ='.$rm;
      $res = $GLOBALS['conn']-> query($sql);
      if($res)
        echo "Atualizado com sucesso!";
      else
        echo "Erro ao atualizar";
  }
  function TrocarFoto($rm,$foto){
    $destino = 'usuario/fotos/'.$rm.'/'.$foto['name'];
    if(move_uploaded_file($foto['tmp_name'], $destino)){
      $sql = 'SELECT * FROM usuario WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      $user = $res->fetch_array();
      unlink($user['perfil']);
      $sql = 'UPDATE usuario SET perfil "'.$destino.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Atualizado com sucesso";
      }
      else{
        echo "Erro ao atualizar foto";
      }
    }
  }
  function TrocarSenha(){
    $nova_senha = ""; //fazer método
    $sql = 'UPDATE usuario SET senha ="'.$nova_senha.'" WHERE rm = '.$rm;
    $res = GLOBALS['conn']->query($sql);
    $user = $res->fetch_array();
    if(mail($user['email'], "Biblioteca [nova senha]",$msg)){
      $sql = 'UPDATE usuario SET senha = "'.$nova_senha.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Nova senha encaminhada para seu email!";
      } else{
        echo "Erro ao trocar a senha. Tente novamente";
      }
    }
  }


  function CadastrarLivro($isbn, $titulo, $ano, $qtd, $sinopse, $classificacao, $id_editora, $id_genero, $estado, $capa){
    $sql = 'INSERT INTO livro(isbn, titulo, ano, qtd, sinopse, classificacao, id_editora, id_genero, estado, capa) VALUES ("'.$isbn.'","'.$titulo.'","'.$ano.'","'.$qtd.'","'.$sinopse.'","'.$classificacao.'","'.$id_editora.'","'.$id_genero.'","'.$estado.'","'.$capa.'")';
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro cadastrado com sucesso!";
    }else{
      echo "Erro ao cadastrar";
    }
  }
  function MostrarLivro(){
    $query = "SELECT cd, isbn, titulo, ano, qtd, sinopse, classificacao, id_editora, id_genero, estado FROM livro";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function ListarLivro($cd){
      $sql = 'SELECT * FROM livro';
      if($cd>0){
          $sql.=' WHERE cd='.$cd;
      }
      $res = $GLOBALS['conn']->query($sql);
      return $res;
  }
  function ExcluirLivro($cd){
    $sql = 'DELETE FROM livro WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro excluído";
    } else {
      echo "Erro ao excluir";
    }
  }


  function CadastrarGenero($nome){
    $sql = 'INSERT INTO genero VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function MostrarGenero(){
    $query = "SELECT * from genero";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function ExcluirGenero($cd){
    $sql = 'DELETE FROM genero WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero excluído";
    } else {
      echo "Erro ao excluir, verifique se há livros utilizando.";
    }
  }


  function CadastrarEditora($nome){
    $sql = 'INSERT INTO editora VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Editora cadastrada";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function MostrarEditora(){
    $query = "SELECT * from editora";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function ExcluirEditora($cd){
    $sql = 'DELETE FROM editora WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero excluído";
    } else {
      echo "Erro ao excluir";
    }
  }


  function CadastrarAutor($nome){
    $sql = 'INSERT INTO autor VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Autor cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function MostrarAutor(){
    $query = "SELECT * from autor";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function ExcluirAutor($cd){
    $sql = 'DELETE FROM autor WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Autor excluído";
    } else {
      echo "Erro ao excluir";
    }
  }
  function MostrarAutorEditora(){
    $sql = 'SELECT * FROM autor AND editora;';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo $res;
    } else{
      echo "Erro ao consultar";
    }
  }
?>