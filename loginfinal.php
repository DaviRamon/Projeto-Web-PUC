<?php
include("funcoes.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginn_estilo.css">
</head>

<body>
    <div>
        <?php

        if (isset($_GET['cadastrofinal']) && $_GET['cadastrofinal'] == 'success') {
            echo "<p> Cadastrado com sucesso! logue....";
        }
        ?>
        <div id="titulo">
            Meu Empréstimo
        </div>

        <div id="usuario">
            <form action="loginfinal.php" method="POST">

                <label for="usuario"> Usuário: </label><br>
                <input type="text" name="usuario" placeholder=" Digite seu nome de usuário" required><br><br>
                <label for="senha"> Senha:<br></label>
                <input type="password" name="senha" placeholder="Digite sua senha" required><br><br>
                <button type="submit"> Entrar</button>
            </form>
            <p>clique <a href="cadastrofinal.php">aqui</a> e cadastre-se</p>

        </div>
    </div>

    <?php
    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $resultado = login($usuario, $senha);
        switch ($resultado) {
            case "logado_com_sucesso";
                header("Location: ../webatp/paginainicio.php");
                break;
            case "erro_no_login";
                echo "Usuário e senha incorretos, tente novamente!";
                break;
        }
    }
    ?>

</body>

</html>
