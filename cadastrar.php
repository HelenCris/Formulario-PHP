<?php
    include_once "./conexao.php";
    //Recebe os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Verifica se o usuário clicou no botão
    if(!empty($dados['CadastroUsuario'])) {
        $empty_input = false;
        $dados = array_map('trim', $dados);
        if(in_array("", $dados)) {
            $empty_input = true;
            echo"<p style='color: #f00;'>Erro: Necessário preencher todos os campos</p>";
        }

        var_dump($dados); 


        $query_user = "insert into crud (nome, email) values (':nome', ':email')";
        $cad_usuario = $conexao->prepare($query_user);
        $cad_usuario->bindParam(':nome', $dados['nome']);
        $cad_usuario->execute();
        if($cad_usuario->rowCount()) {
            echo "Usuário cadastrado com sucesso!<br>";
        } else {
            echo "Erro: Usuário não cadastrado com sucesso!<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
</head>
<body class="content">
<div id="cadastro">
    <form name="cad-usuario" method="POST"> 
      <h1>Cadastro</h1> 
       
      <p> 
        <label for="">Nome: </label>
        <input id="nome_cad" type="text" name="nome" id="nome" placeholder="Nome completo" required="required"/>
      </p>
       
      <p> 

        <label for="">E-mail: </label>
        <input id="email_cad" type="email" name="email" id="email" placeholder="Seu melhor e-mail">
      </p>
       
       
      <p><input type="submit" value="Cadastrar" name="CadastroUsuario"></p>

    </form>
    
</body>
</html>