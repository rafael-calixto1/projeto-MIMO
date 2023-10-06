<?php
class Item {
    private $idItem;
    private $idUsuario;
    private $descricao;
    private $quantidade;
    private $visualizacao;
    private $dataRegistro;
    private $valor;
    private $fotoItem;
    private $idCategoria;

    public function __construct($idUsuario, $descricao, $quantidade, $visualizacao, $dataRegistro, $valor = null, $fotoItem = null, $idCategoria = null) {
        $this->idUsuario = $idUsuario;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->visualizacao = $visualizacao;
        $this->dataRegistro = $dataRegistro;
        $this->valor = $valor;
        $this->fotoItem = $fotoItem;
        $this->idCategoria = $idCategoria;
    }

    public function getIdItem() {
        return $this->idItem;
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

    public function getVisualizacao() {
        return $this->visualizacao;
    }

    public function setVisualizacao($visualizacao) {
        $this->visualizacao = $visualizacao;
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
}
    
?>