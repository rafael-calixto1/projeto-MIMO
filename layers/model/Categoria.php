<?php
    class Categoria {
        private $idCategoria;
        private $idUsuario;
        private $descricao;

        public function __construct($idUsuario, $descricao) {
            $this->idUsuario = $idUsuario;
            $this->descricao = $descricao;
        }

        public function getIdCategoria() {
            return $this->idCategoria;
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
    }

?>