<?php
class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function inserirUsuarioBD() {
        require_once "ConexaoBD.php";
        
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        
        try {
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $this->nome, $this->email, $this->senha);
    
                if ($stmt->execute()) {
                    $this->idUsuario = $stmt->insert_id;
                    $stmt->close();
                    $conn->close();
                    return "sucesso"; 
                } else {
                    $stmt->close();
                    $conn->close();
                    return "falha"; 
                }
            } 
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                return "emailDuplicado"; 
            } else {
                return "erroDB"; 
            }
        }
    }

    public function entrarUsuario() {
        require_once "ConexaoBD.php";
        
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
    
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $this->email);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    $senhaVerify = $user['senha'];
                    if(password_verify($this->senha, $senhaVerify)){
                        $stmt->close();
                        $conn->close();
                        return $user;
                    } else {
                        $stmt->close();
                        $conn->close();
                        return FALSE;
                    }
                }
            }
        }
        
        $stmt->close();
        $conn->close();
        return null;
    }
}


?>