<?php

    class ItemPatrimonio{
        private $conexao;
        private $id;
        private $codigo;
        private $descricao;
        private $condicao;
        private $localizacao;
    
        public function __construct($db){
            $this->conexao = $db;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getcodigo(){
            return $this->codigo;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getDescricao(){
            return $this->descricao;
        }
        public function setCondicao($condicao){
            $this->condicao = $condicao;
        }

        public function getCondicao(){
            return $this->condicao;
        }
        public function setLocalizacao($localizacao){
            $this->localizacao = $localizacao;
        }

        public function getLocalizacao(){
            return $this->localizacao;
        }

        public function create(){
            $query = "INSERT INTO itens SET codigo=:codigo, descricao=:descricao, condicao=:condicao, localizacao=:localizacao";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(":codigo",$this->codigo);
            $stmt->bindParam(":descricao",$this->descricao);
            $stmt->bindParam(":condicao",$this->condicao);
            $stmt->bindParam(":localizacao",$this->localizacao);

            if ($stmt->execute()){
                return true;
            }
            return false;
        }

        public function read() {

            $query = "SELECT * FROM itens";
            
            $stmt = $this->conexao->prepare($query);
            
            $stmt->execute();
            
            return $stmt;
            
        }

        public function delete() {

            $query = "DELETE FROM itens WHERE id=:id";
            
            $stmt = $this->conexao->prepare($query);
            
            $stmt->bindParam(":id", $this->id);
            
            if ($stmt->execute()) {
                return true;
            }
            
            return false;
        }

        public function update() {

            $query = "UPDATE itens SET codigo=:codigo, descricao=:descricao, condicao=:condicao, localizacao=:localizacao WHERE id=:id";
            $stmt = $this->conexao->prepare($query);
            
            $stmt->bindParam(":codigo", $this->codigo);
            $stmt->bindParam(":descricao", $this->descricao);
            $stmt->bindParam(":condicao", $this->condicao);
            $stmt->bindParam(":localizacao", $this->localizacao);
            $stmt->bindParam(":id", $this->id);
            
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function consultar(){
            $query = "SELECT * FROM itens WHERE id=:id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
                return $stmt;
        }

    }
?>