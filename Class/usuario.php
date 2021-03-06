<?php

    class Usuario {

        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;
        
        // getters =  mostra
        public function getIdusuario(){
            return $this->idusuario;
        }

        public function getDeslogin(){
            return $this->deslogin;
        }

        public function getDessenha(){
            return $this->dessenha; 
        }

        public function getDtcadastro() {
            return $this->dtcadastro;
        }

        // setters = setta valor

        public function setIdusuario($value){
            $this->idusuario = $value;
        }

        public function setDeslogin($value){
            $this->deslogin = $value;
        }

        public function setDessenha($value){
            $this->dessenha = $value;
        }
        public function setDtcadastro($value){
            $this->dtcadastro = $value;
        }

        public function loadById($id){
            $sql = new Sql();
    
            $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));// esse comando vai ser enviado para o methodo dentro da classe que recebe e trata a RawQuery onde o ID passado como parametro do methodo vai ser igual ao id do banco pra consulta da query 
            
    
            if (count($results) > 0){ 
                $this->setData($results[0]);
                // em seguida ele verifica se a quantiadade de resultados e maior que 0
                //e atribui a variavel row o retorno do array no indice 0
    
                
                // em seguida é setado os valores pelo methodo set onde e passado como parametros o array $row( que e o retorno da query) e passao a chave do array ( ou coluna do banco de dados onde esta a informação)
    
    
    
            }
            
        }
        // listar todos os usuarios
    
        public static  function getlist(){
            $sql = new Sql();
    
            return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
        }
    
        public static function search($login){
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH",array(':SEARCH'=>"%".$login."%"));
        }
    
        public function login($login, $senha){
            $sql = new Sql();
    
            $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array (
                ":LOGIN"=>$login,
                ":SENHA"=>$senha
            ));
    
            if (count($results) > 0){
                
                $this->setData($results[0]);
    
    
                
            }else {
                throw new Exception("Error de Login", 1);
                
            }
    
    
        }
        public function setData($data){
    
            $this->setIdusuario($data['idusuario']);
                $this->setDeslogin($data['deslogin']);
                $this->setDessenha($data['dessenha']);
                
                $this->setDtcadastro(new DateTime($data['dtcadastro']));
        }
    
        public function insert(){
            $sql = new Sql;
    
            $results = $sql->select("EXECUTE sp_usuarios_insert :LOGIN, :PASSWORD", array(
                ":LOGIN"=>$this->getDeslogin(),
                ":PASSWORD"=>$this->getDessenha()
            ));
    
            if(count($results)> 0){
                $this->setData($results[0]);
            }
        }
    
        public function __toString(){
            // em seguida o methodo magico transforma o array pra exibição 
    
            return json_encode(array(
                "idusuario"=>$this->getIdusuario(),
                "deslogin"=>$this->getDeslogin(),
                "dessenha"=>$this->getDessenha(),
                
                "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:m:s") // como getDtCadastro recebeu uma nova instancia do objetivo DateTime posso chamar o format em seguida
            ));
            // em retorna os atributos  transformados em Json usando o methodo que pega o valor do atributo para exibir 
        }

    }
