<?php

require_once './database.php';

class Procesador {

    private $db;
    private $id_componente;
    private $frecuencia;
    private $socket;
    private $nucleos;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO procesador(id_componente, frecuencia, socket, nucleos) 
                 VALUES($this->id_componente, 
                        $this->frecuencia, 
                        '$this->socket', 
                        $this->nucleos
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM procesador WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */
    
    public function getId_componente() {
        return $this->id_componente;
    }

    public function getFrecuencia() {
        return $this->frecuencia;
    }

    public function getSocket() {
        return $this->socket;
    }

    public function getNucleos() {
        return $this->nucleos;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setFrecuencia($frecuencia): void {
        $this->frecuencia = $frecuencia;
    }

    public function setSocket($socket): void {
        $this->socket = $socket;
    }

    public function setNucleos($nucleos): void {
        $this->nucleos = $nucleos;
    }
}
