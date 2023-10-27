<?php
    class ItemController {
        public function inserirItem($id_usuario, $nome_produto, $descricao, $quantidade, $data_registro, $valor, $foto, $id_categoria){
            require_once "../model/Item.php";
            $item = new Item();
            $item->setIdUsuario($id_usuario);
            $item->setNomeProduto($nome_produto);
            $item->setDescricao($descricao);
            $item->setQuantidade($quantidade);
            $item->setDataRegistro($data_registro);
            $item->setValor($valor);
            $item->setFotoItem($foto);
            $item->setIdCategoria($id_categoria);
            $r = $item->inserirItemBD();
            return $r;
        }

        public function listarItens($id_usuario){
            require_once "../model/Item.php";
            $item = new Item();
            $item->setIdUsuario($id_usuario);
            $re = $item->listarItens();
            return $re;
        }

        public function listarItemPorId($id_usuario, $id_produto){
            require_once "../model/Item.php";
            $item = new Item();
            $item->setIdUsuario($id_usuario);
            $item->setIdItem($id_produto);
            $re = $item->listarItemId();
            return $re;
        }

        public function atualizarItem($nome_produto, $descricao, $quantidade, $valor, $id_categoria, $id_usuario, $id_produto){
            require_once "../model/Item.php";
            $item = new Item();
            $item->setNomeProduto($nome_produto);
            $item->setDescricao($descricao);
            $item->setQuantidade($quantidade);
            $item->setValor($valor);
            $item->setIdCategoria($id_categoria);
            $item->setIdItem($id_produto);
            $item->setIdUsuario($id_usuario);
            $r = $item->atualizarItemBD();
            return $r;
        }

        public function atualizarFotoItem($foto,$id_usuario, $id_produto){
            require_once "../model/Item.php";
            $item = new Item();
            $item->setIdUsuario($id_usuario);
            $item->setFotoItem($foto);
            $item->setIdItem($id_produto);
            $r = $item->atualizarFotoItemBD();
            return $r;
        }

        public function removerItem($id_produto, $id_usuario){
            require_once '../model/Item.php';
            $item = new Item();
            $item->setIdUsuario($id_usuario);
            $item->setIdItem($id_produto);
            $r = $item->removerItemBD();
            return $r;
        }
    }
?>