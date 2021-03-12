<?php

require_once './database.php';

class Placa_base {

    private $db;
    private $id_componente;
    private $vram;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO tarjeta_grafica(id_componente, vram) 
                 VALUES($this->id_componente, 
                        '$this->vram'       
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM tarjeta_grafica WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId_componente() {
        return $this->id_componente;
    }

    public function getVram() {
        return $this->vram;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setVram($vram): void {
        $this->vram = $vram;
    }

}
