<?php

    class db{

        public $conn;
        
        public function __construct($bdlocal='localhost', $bdusuario='root', $bdsenha ='davi1234', $bdnome ='atpweb'){
            $this->conn = mysqli_connect($bdlocal, $bdusuario, $bdsenha, $bdnome);
            if (!$this->conn){
                die("Conexao falhou: " . mysqli_connect_error());
            }
        }
        
    }


 
?>
