<?php
class Transacao {
    private $idTransacao;
    private $idItem;
    private $quantidadeItem;
    private $idUsuario;
    private $nomeCliente;
    private $cpf;
    private $data;
    private $valorTotal;

    public function __construct($idItem, $quantidadeItem, $idUsuario, $nomeCliente, $cpf, $data, $valorTotal) {
        $this->idItem = $idItem;
        $this->quantidadeItem = $quantidadeItem;
        $this->idUsuario = $idUsuario;
        $this->nomeCliente = $nomeCliente;
        $this->cpf = $cpf;
        $this->data = $data;
        $this->valorTotal = $valorTotal;
    }

    public function getIdTransacao() {
        return $this->idTransacao;
    }

    public function getIdItem() {
        return $this->idItem;
    }

    public function getQuantidadeItem() {
        return $this->quantidadeItem;
    }

    public function setIdItem($idItem) {
        $this->idItem = $idItem;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNomeCliente() {
        return $this->nomeCliente;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getData() {
        return $this->data;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }
}

?>