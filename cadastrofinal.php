<?php
include_once ("funcoes.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastroo_estilo.css">

</head> 
<body>

<div id="titulo">
    <p>
        Cadastro de usuário
    </p>
</div>
<div id="formulario">
    <form action="cadastrofinal.php" method ="POST">
    <label for="nome"> Nome: </label><br>
    <input type="text" name="nome" placeholder="Digite seu Nome" required><br><br>

    <label for="cademail"> E-mail: </label><br>
    <input type="email" name ="cademail" placeholder="Digite seu E-mail"required><br><br>

    <label for="cadusuario"> Usuário:</label><br>
    <input type="text" name ="cadusuario" placeholder="Cadastre seu Usuário"required><br><br>

    <label for="cadsenha"> Senha:</label><br>
    <input type="text" name="cadsenha" placeholder="Cadastre sua Senha"required><br><br>

    <label for="confirmasenha"> Confirme a Senha:</label><br>
    <input type="text" name="confirmasenha" placeholder="Confirme sua Senha"required><br><br>

    <button type="submit">Cadastrar</button>
    <a href="loginfinal.php"> <input type="button" value="Voltar"><a>
    </form>

   

</div>
<div>

<?php
    if (!empty($_POST)){
        $nome = $_POST['nome'];
        $email = $_POST['cademail'];
        $usuario = $_POST['cadusuario'];
        $senha = $_POST['cadsenha'];
        $confirmasenha = $_POST['confirmasenha'];
        $resultado = cadastrar($nome, $email, $usuario, $senha, $confirmasenha);
        switch($resultado){
            case "cadastrado_com_sucesso";

                sleep(2);
                header('Location: ../webatp/loginfinal.php?cadastrofinal.php=success');
                break;

            case "cadastro_falhou";
                break;
                
            case "usuario_existente";
                echo"Este usuário já está cadastrado";
                break;

            case "senha_nao_confere";
                echo"senhas não conferem, tente novamente!";
                break;
        
        }  
    }

    ?>
    
    </div>


</body>
</html>
