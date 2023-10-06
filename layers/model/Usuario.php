<?php
class Usuario {
    private $idUsuario;
    private $email;
    private $login;
    private $senha;
    private $endereco;
    private $foto;
    private $bio;

    public function __construct($email, $login, $senha, $endereco, $foto = null, $bio = null) {
        $this->email = $email;
        $this->login = $login;
        $this->senha = $senha;
        $this->endereco = $endereco;
        $this->foto = $foto;
        $this->bio = $bio;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getBio() {
        return $this->bio;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }
}

?>