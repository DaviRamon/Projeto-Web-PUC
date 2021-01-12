<?php

include ("banco.php");
session_start();

function login($usuario, $senha){
    $bancodedado = new db();
    $sql = "SELECT * FROM cadastro WHERE usuario ='$usuario' AND senha = '$senha'";
    $resultado = $bancodedado->conn->query($sql);
    if($resultado->num_rows > 0){
        while ($row = $resultado->fetch_assoc()) {
            $_SESSION["id_cadastro"] = $row["id_cadastro"];
            return "logado_com_sucesso";
        }
    } else{
        return "erro_no_login"; 
    }
}
 

function cadastrar($nome, $email, $usuario, $senha, $confirmasenha){
    $bancodedados = new db();
    if ($senha == $confirmasenha){
        $sqltwo = "SELECT * FROM cadastro WHERE usuario = '$usuario'";
        $resultado = $bancodedados->conn->query($sqltwo);  
        if($resultado->num_rows > 0){
            return "usuario_existente";
        }else{
            $sqltwo = "INSERT INTO `cadastro` (`id_cadastro`, `nome`, `email`, `usuario`, `senha`) VALUES (NULL, '$nome', '$email', '$usuario', '$confirmasenha')";

            
            if($bancodedados->conn->query($sqltwo) === TRUE){
                return "cadastrado_com_sucesso";
            }else{ return "cadastro_falhou";   
            }
        }
    }else{
        return "senha_nao_confere";
    }    

}


function novo_item($item, $data, $qtditem, $descricao, $data_devolucao){
    $banco = new db();
    $sqlthree = "INSERT INTO `emprestimo` (`id_emprestimo`, `nome_item`, `data_emprestimo`, `quantidade`, `descricao`, `data_devolucao`) VALUES (NULL, '$item', '$data', '$qtditem', '$descricao', NULL)";

    if($banco->conn->query($sqlthree) === TRUE){
        return "criado_com_sucesso";
    } else {
        return "criacao_falhou";
    }
}



function recebeitens(){
    $banco = new db();
    $sqlfour = "SELECT * FROM emprestimo";
    $resultado = $banco->conn->query($sqlfour);
    $lista = array();
    $indice =0;
    if($resultado->num_rows > 0){
        while($linha = $resultado->fetch_assoc()){
            $lista[$indice] =$linha;
            $indice++;
        }
    }
    return $lista;

}
