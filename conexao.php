<?php

    class Conexao {

    private $dsn = 'mysql:host=localhost; dbname=db_agenda';
    private $user = 'root';
    private $pass = '';

        public function conectar() {
            try {
                $con = new PDO($this->dsn, $this->user, $this->pass);
                return $con;

                } catch (PDOException $e) {
                echo '</br>' . $e->getError();
                echo '</br>' . $e->getMessage();
                }
            }
    }

?>