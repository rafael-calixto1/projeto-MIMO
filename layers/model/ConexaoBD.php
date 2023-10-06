<?php
    class ConexaoBD{
        private $serverName = "localhost";
        private $userName = "root";
        private $password = "x";
        private $dbName = "x";
     
          public function conectar() {
             $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
             return $conn;
          }
        }
?>