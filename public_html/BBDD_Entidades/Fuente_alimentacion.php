<?php

require_once './database.php';

class Fuente_alimentacion {

    private $db;
    private $id_componente;
    private $potencia;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO fuente_alimentacion(id_componente, potencia) 
                 VALUES($this->id_componente, 
                        '$this->potencia'               
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM fuente_alimentacion WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId_componente() {
        return $this->id_componente;
    }

    public function getPotencia() {
        return $this->potencia;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setPotencia($potencia): void {
        $this->potencia = $potencia;
    }

}
