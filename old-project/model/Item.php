<?php
class Item {
    private $idItem;
    private $idUsuario;
    private $nomeProduto;
    private $descricao;
    private $quantidade;
    private $dataRegistro;
    private $valor;
    private $fotoItem;
    private $idCategoria;

    public function setIdItem($idItem) {
        $this->idItem = $idItem;
    }

    public function getIdItem() {
        return $this->idItem;
    }

    public function setIdUsuario($idUsuario) {
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

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    public function setDataRegistro($dataRegistro){
        $this->dataRegistro = $dataRegistro;
    }

    public function getDataRegistro() {
        return $this->dataRegistro;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getFotoItem() {
        return $this->fotoItem;
    }

    public function setFotoItem($fotoItem) {
        $this->fotoItem = $fotoItem;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function inserirItemBD(){
        require_once "ConexaoBD.php";

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Conexao falhou: ".$conn->connect_error);
        }

        $sql = "INSERT INTO produtos (id_usuario, nome_produto, descricao, quantidade, data_registro, valor, foto, id_categoria) 
        VALUES ('".$this->idUsuario."', '".$this->nomeProduto."', '".$this->descricao."', 
                '".$this->quantidade."', '".$this->dataRegistro."', '".$this->valor."', 
                '".$this->fotoItem."', ".$this->idCategoria.")";

        if ($conn->query($sql) === TRUE) {
            $this->idItem  = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    public function removerItemBD(){
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
            
        if($conn->connect_error){
            die("Conexao falhou: ".$conn->connect_error);
        }
            
        $sql = "DELETE FROM produtos WHERE id_produto = ? AND id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $this->idItem, $this->idUsuario);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $stmt->close();
            $conn->close();
            return TRUE;
        } else {
            $stmt->close();
            $conn->close();
            return FALSE;
        }
    }

    public function atualizarItemBD(){
        require_once "ConexaoBD.php";

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if($conn->connect_error){
            die("Conexao falhou: ".$conn->connect_error);
        }

        $sql = "UPDATE produtos 
                SET nome_produto = '".$this->nomeProduto."',
                    descricao = '".$this->descricao."',
                    quantidade = '".$this->quantidade."',
                    valor = '".$this->valor."',
                    id_categoria = '".$this->idCategoria."'
                        WHERE id_produto = ".$this->idItem." AND id_usuario = ".$this->idUsuario;

            
        if($conn->query($sql) == TRUE){
                $conn->close();
                return TRUE;
        } else {
            $conn->close();
            return FALSE;
         }
    }

    public function atualizarFotoItemBD(){
        require_once "ConexaoBD.php";

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if($conn->connect_error){
            die("Conexao falhou: ".$conn->connect_error);
        }

        $sql = "UPDATE produtos 
                SET foto = '".$this->fotoItem."'
                        WHERE id_produto = ".$this->idItem." AND id_usuario = ".$this->idUsuario;

            
        if($conn->query($sql) == TRUE){
                $conn->close();
                return TRUE;
        } else {
            $conn->close();
            return FALSE;
         }
    }

    public function listarItens(){
        require_once "ConexaoBD.php";
    
            $con = new ConexaoBD();
            $conn = $con->conectar();
            if($conn->connect_error){
                die("Conexao falhou: ".$conn->connect_error);
            }
    
            $sql = "SELECT id_produto, nome_produto, descricao, quantidade, data_registro, valor, foto, id_categoria 
          FROM produtos WHERE id_usuario = ".$this->idUsuario;
    
            $result = $conn->query($sql);

            if($result == TRUE){
                    $conn->close();
                    return $result;
            } else {
                $conn->close();
                return FALSE;
             }
    }

    public function listarItemId(){
        require_once "ConexaoBD.php";
    
            $con = new ConexaoBD();
            $conn = $con->conectar();
            if($conn->connect_error){
                die("Conexao falhou: ".$conn->connect_error);
            }

            $sql = "SELECT p.id_produto, p.nome_produto, c.id_categoria, c.descricao categoria_desc, p.quantidade, p.valor, p.descricao, p.foto 
            FROM produtos p INNER JOIN categoria c ON p.id_categoria = c.id_categoria AND p.id_produto = ".$this->idItem." AND p.id_usuario = ".$this->idUsuario;
    
            $result = $conn->query($sql);

            if($result == TRUE){
                    $linha = $result->fetch_assoc();
                    $conn->close();
                    return $linha;
            } else {
                $conn->close();
                return FALSE;
             }
    }
}
