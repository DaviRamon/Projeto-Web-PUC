<?php
include "funcoes.php";
$itens = recebeitens();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="usuario_estilo.css">

</head>

<body>


    <section id="itens" class="conteudo">
        <article class="box">
            <h2>Cadastro de Itens</h2>
            <div>
                <p>Aqui você pode realizar o cadastro do item que deseja emprestar da empresa. O item ficará destacado na sua Home até a data de devolução. <br> Quando devolvido, deve ser marcado no sistema, que irá salvar a data.
                </p>
            </div id="cadastro_item">
            <form name="paginainicio" method="POST" action="paginainicio.php">
                <p>
                    <div>
                        <label for="nomeitem"> Nome do Item:</label>
                        <input name="nomeitem" type="text" placeholder="Digite o nome o Item" required><br><br>

                        <label for="dataemprestimo"> Data: </label>
                        <input name="dataemprestimo" type="date" required><br><br>

                        <label for="datadevolucao"> Devolução: </label>
                        <input name="datadevolucao" type="date"><br><br>

                        <label for="qtditem"> Quantidade:</label>
                        <input name="qtditem" type="number" name="idade" min=0 max=10 required><br><br>

                        <label for="descricao">Descrição do Item:</label><br>
                        <textarea name="descricaoitem" id="descricao_item" required> </textarea> <br>
                        <input type="submit" name="enviar" id="enviar">
                    </div>
                </p>
            </form>
        </article>
    </section>




    <section id="usuario" class="conteudo">
        <article class="box">
            <h2>Lista de Itens</h2>
            <p>
                Aqui fica a lista dos itens que você emprestou.
            </p>
            <table>
                <tr>                 
                    <th scope="col">Itens</th>
                    <th scope="col">Descrição</th>       
                </tr>
                <tr>
                <?php
                        foreach($itens as $item){
                        
                            echo "<tr>";
                            echo "<td>"  .$item['nome_item']."</td>";
                            echo "<td>"  .$item['descricao']."</td>";
                            echo "<tr>";
                            
                        }
                        ?>
            </table>
        </article>
    </section>

    <header>
        <h1> Sistemas</h1>
        <nav>
            <ul>
                <li id="link-itens "><a href="#itens ">Cadastro de Itens</a></li>
                <li id="link-usuario "><a href="#usuario ">Lista de Itens</a></li>
            </ul>
        </nav>
    </header>



    <?php

    if (!empty($_POST)) {
        $item = $_POST['nomeitem'];
        $data = $_POST['dataemprestimo'];
        $data_devolucao = $_POST['datadevolucao'];
        $qtditem = $_POST['qtditem'];
        $descricao = $_POST['descricaoitem'];

        $resultado = novo_item($item, $data, $qtditem, $descricao, $data_devolucao);

        switch ($resultado) {
            case "criado_com_sucesso";

                header('Location: ../webatp/paginainicio.php?created=sucess');
                break;

            case "criacao_falhou";
                echo "Ocorreu um erro ao cadastrar o Item!";
        }
    }

    ?>



</body>

</html>
