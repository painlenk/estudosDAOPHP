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
                $row = $results[0];
                // em seguida ele verifica se a quantiadade de resultados e maior que 0
                //e atribui a variavel row o retorno do array no indice 0

                $this->setIdusuario($row["idusuario"]);
                $this->setDeslogin($row["deslogin"]);
                $this->setDessenha($row["dessenha"]);
                $this->setDtcadastro( new DateTime($row["dtcadastro"]));
                // em seguida é setado os valores pelo methodo set onde e passado como parametros o array $row( que e o retorno da query) e passao a chave do array ( ou coluna do banco de dados onde esta a informação)



            }
        }

        // public static function getList() {
        //     $sql = new Sql();
        //     $select = "SELECT * FROM tb_usuarios";

        //     return $sql->select($select." ORDER BY deslogin");
        // }

        // public static function search($login) {
        //     $sql = new Sql();
        //     $select = "SELECT * FROM tb_usuarios";
        //     return $sql->select($select."  WHERE deslogin like :SEARCH ORDER BY deslogin",array(
        //         ':SEARCH'=>"%".$login."%"
        //     ));
        // }

        // public function login($user, $password) {
        //     $sql = new Sql();
        //     $select = "SELECT * FROM tb_usuarios";
        //     $results = $sql->select($select. " WHERE deslogin = :LOGIN AND dessenha  = :PASSWORD",array(
        //         ':LOGIN'=>$user,
        //         'PASSWORD'=>$password,
        //     ));

        //     if (count($results)> 0) {
        //         $row = $results[0];

        //         $this->setIdusuario($row['idusuario']);
        //         $this->setDeslogin($row['deslogin']);
        //         $this->setDessenha($row['dessenha']);
        //         $this->setDtcadastro(new DateTime($row['dtcadastro']));

        //     }
        //     else {
        //         throw new Exception("Dados de Login Invalidos!!");

        //     }
        // }


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



?>