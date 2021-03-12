<?php

require_once './database.php';

class Placa_base {

    private $db;
    private $id_componente;
    private $factor_forma;
    private $socket;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO placa_base(id_componente, factor_forma, socket) 
                 VALUES($this->id_componente, 
                        '$this->factor_forma', 
                        '$this->socket'                     
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM placa_base WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId_componente() {
        return $this->id_componente;
    }

    public function getFactor_forma() {
        return $this->factor_forma;
    }

    public function getSocket() {
        return $this->socket;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setFactor_forma($factor_forma): void {
        $this->factor_forma = $factor_forma;
    }

    public function setSocket($socket): void {
        $this->socket = $socket;
    }

}
