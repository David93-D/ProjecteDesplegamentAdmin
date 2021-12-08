<?php

class dadesFormulari {

    private $nom;
    private $cognom;
    private $poblacio;
    private $email;
    private $contrasenya;
    private $contrasenya_conf;
    private $rol;
    
    function __construct ($nom, $cognom, $poblacio, $email, $contrasenya, $contrasenya_conf, $rol) {
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->poblacio = $poblacio;
        $this->email = $email;
        $this->contrasenya = $contrasenya;
        $this->contrasenya_conf = $contrasenya_conf;
        $this->rol = $rol;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getCognom() {
        return $this->cognom;
    }

    public function setCognom($cognom) {
        $this->nom = $cognom;
    }

    public function getPoblacio() {
        return $this->poblacio;
    }

    public function setPoblacio($poblacio) {
        $this->poblacio = $poblacio;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->nom = $email;
    }

    public function getContrasenya() {
        return $this->contrasenya;
    }

    public function setContrasenya($contrasenya) {
        $this->contrasenya = $contrasenya;
    }

    public function getContrasenya_conf() {
        return $this->contrasenya_conf;
    }

    public function setContrasenya_conf($contrasenya_conf) {
        $this->contrasenya_conf = $contrasenya_conf;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

}

?>