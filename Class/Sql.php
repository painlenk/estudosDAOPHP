<?php

class Sql extends PDO { 
    private $conn;

    public function __construct(){
        $dbPhp7SQLServer = "sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS1;ConnectionPooling=0". "sa". "253145";
    
        $this->conn = new PDO($dbPhp7SQLServer);
        
        // metodo construtor inicia a classe ja conectando ao banco de dados , poderria passar as conecxões por parametros tambem
    }

    private function setParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value){
            $this->setParam($statement, $key, $value);
        }
        //metodo setParams recebe o statment e parameters 
        // e para cada elemento no parametro ele pega a chave e valor 
        // e entao passa para o methdoo setparam 

    }

    private function setParam($statement, $key, $value){
        $statement->bindParam( $key, $value);
        // o metodo setParam recebe cada um dos parametros contendo a chave e valor 
        // e entao realiza o bindParam de cada um
        // exemplo :ID, $id
    }


    public function query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
        // a função query recebe a query(bruta) e $params
        // a variavel stmt recebe o atributo conn realizando o prepare(que vai fazer a query falar com o banco de dados)
        // em seguida chama o metodo setParams
        // e pos retorna o $stmt para  o methodo select que vai usar ele

    }

    public function select ($rawQuery, $params = array()):array{
        $stmt = $this->query($rawQuery, $params);
    
        // metodo que fará o select passando como parametro a query(bruta) e o params
        // a variavel $stmt vai ser igual ao retorno da função query passando como parametro a query(bruta) e $params (espera receber um array)

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        // em seguida retorna a variavel $stmt fazendo um fetchAll(retorna um array)
        // entao passa o metodo magico FECTH_ASSOC para mostrar todos os itens associados do array 
    }


}




?>