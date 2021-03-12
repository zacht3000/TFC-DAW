<?php

require_once './database.php';

class Disco_duro {

    private $db;
    private $id_componente;
    private $tipo;
    private $almacenamiento;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO disco_duro(id_componente, tipo, almacenamiento) 
                 VALUES($this->id_componente, 
                        '$this->tipo', 
                        '$this->almacenamiento'
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM disco_duro WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */
    
    public function getId_componente() {
        return $this->id_componente;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getAlmacenamiento() {
        return $this->almacenamiento;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setAlmacenamiento($almacenamiento): void {
        $this->almacenamiento = $almacenamiento;
    }
}
