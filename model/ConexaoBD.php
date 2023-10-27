<?php
    class ConexaoBD{
        private $serverName = "localhost";
        private $userName = "root";
        private $password = "usbw";
        private $dbName = "mimo";
     
          public function conectar() {
             $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
             return $conn;
          }
        }
?>
        