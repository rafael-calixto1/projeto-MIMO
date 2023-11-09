<?php
    class Categoria {
        private $idCategoria;
        private $idUsuario;
        private $descricao;

        public function getIdCategoria() {
            return $this->idCategoria;
        }

        public function setIdUsuario ($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function inserirCategoriaBD(){
            require_once "ConexaoBD.php";
    
            $con = new ConexaoBD();
            $conn = $con->conectar();
            if ($conn->connect_error) {
                die("Conexao falhou: ".$conn->connect_error);
            }
    
            $sql = "INSERT INTO categoria (id_usuario, descricao) 
            VALUES (".$this->idUsuario.", '".$this->descricao."')";
    
            if ($conn->query($sql) === TRUE) {
                $this->idCategoria = mysqli_insert_id($conn);
                $conn->close();
                return TRUE;
            } else {
                $conn->close();
                return FALSE;
            }
        }

        public function listarCategoria(){
            require_once "ConexaoBD.php";
    
            $con = new ConexaoBD();
            $conn = $con->conectar();
            if($conn->connect_error){
                die("Conexao falhou: ".$conn->connect_error);
            }
    
            $sql = "SELECT id_categoria, descricao FROM categoria WHERE id_usuario = ".$this->idUsuario;
    
            $result = $conn->query($sql);

            if($result == TRUE){
                    $conn->close();
                    return $result;
            } else {
                $conn->close();
                return FALSE;
             }
        }
    }

    

?>