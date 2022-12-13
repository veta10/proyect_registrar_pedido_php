<?php

class Cliente {
    private $Id;
    private $Dni;
    private $Nombre;
    private $Apellido;  
    private $Correo;
    private $Telefono;
    public function __construct($Id, $Dni, $Nombre, $Apellido, $Correo, $Telefono) {
        $this->Id = $Id;
        $this->Dni = $Dni;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Correo = $Correo;
        $this->Telefono = $Telefono;
    }
    public function getId() {
        return $this->Id;
    }

    public function getDni() {
        return $this->Dni;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getApellido() {
        return $this->Apellido;
    }

    public function getCorreo() {
        return $this->Correo;
    }

    public function getTelefono() {
        return $this->Telefono;
    }

    public function setId($Id): void {
        $this->Id = $Id;
    }

    public function setDni($Dni): void {
        $this->Dni = $Dni;
    }

    public function setNombre($Nombre): void {
        $this->Nombre = $Nombre;
    }

    public function setApellido($Apellido): void {
        $this->Apellido = $Apellido;
    }

    public function setCorreo($Correo): void {
        $this->Correo = $Correo;
    }

    public function setTelefono($Telefono): void {
        $this->Telefono = $Telefono;
    }



}

