<?php

    class Contato {
        private $id;
        private $nome;
        private $telefone;
        private $email;
            
        public function __set($attr, $valor) {
            $this->$attr = $valor;
        }
        public function __get($attr) {
            return $this->$attr;
        }
    }

?>