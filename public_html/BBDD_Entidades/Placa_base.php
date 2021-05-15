<?php

include($_SERVER['DOCUMENT_ROOT']."/database.php");

class Placa_base {

    private $db;
    private $id_componente;
    private $factor_forma;
    private $socket;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getPlacasBase() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'placa_base'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getPlacaBaseGenerador($min) {
        $query = $this->db->query('SELECT  pb.id_componente, c.nombre, c.proveedor, c.precio_total, pb.factor_forma, pb.socket FROM placa_base pb, componente c WHERE c.id = pb.id_componente AND pb.socket LIKE \'%' . $min . '\' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');

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
