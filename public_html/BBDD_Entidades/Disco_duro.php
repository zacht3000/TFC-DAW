<?php

include($_SERVER['DOCUMENT_ROOT']."/database.php");

class Disco_duro {

    private $db;
    private $id_componente;
    private $tipo;
    private $almacenamiento;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getDiscosDuros() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'disco_duro'");

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
    
    public function getDicosDurosGenerador($tipo, $min) {
            $query = $this->db->query('SELECT dd.id_componente, c.nombre, c.proveedor, c.precio_total, dd.almacenamiento, dd.tipo FROM disco_duro dd, componente c WHERE c.id = dd.id_componente AND dd.tipo LIKE \'' . $tipo . '\' AND dd.almacenamiento = '. $min . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        

        return $query->fetch_all(MYSQLI_ASSOC);
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
