<?php
    class UsuarioController{
        public function inserir($nome, $email, $senha){
            require_once "../model/Usuario.php";
            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setSenha($senha);

            $r = $usuario->inserirUsuarioBD();
            return $r;
        }

        public function entrar($email, $senha){
            require_once "../model/Usuario.php";
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            $r = $usuario->entrarUsuario();
            return $r;
        }
    }

?>