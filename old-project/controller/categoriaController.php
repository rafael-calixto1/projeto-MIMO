<?php
    class CategoriaController{
        public function inserirCategoria($idUsuario, $descricao){
            require_once "../model/Categoria.php";
            $categoria = new Categoria();
            $categoria->setDescricao($descricao);
            $categoria->setIdUsuario($idUsuario);
            $r = $categoria->inserirCategoriaBD();
            return $r;
        }

        public function listarCategoria($id_usuario){
            require_once "../model/Categoria.php";
            $categoria = new Categoria();
            $categoria->setIdUsuario($id_usuario);
            $res = $categoria->listarCategoria();
            return $res;
        }
    }

?>