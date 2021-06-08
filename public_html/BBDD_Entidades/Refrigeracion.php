<?php

include_once($_SERVER['DOCUMENT_ROOT']."/database.php");

class Refrigeracion {

    private $db;
    private $id_componente;
    private $tipo;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getRefrigeraciones() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'refrigeracion'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO refrigeracion(id_componente, tipo) 
                 VALUES($this->id_componente, 
                        '$this->tipo'
                 )";

        return $this->db->query($query);
    }
    
    public function getRefrigeracionGenerador($tipo) {
            $query = $this->db->query('SELECT r.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo, c.tipo as "tipo_componente", r.tipo as "tipo_refrigeracion" FROM refrigeracion r, componente c WHERE c.id = r.id_componente AND r.tipo LIKE \'' . $tipo . '\' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminar($id) {
        $query = "DELETE FROM refrigeracion WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */
    
    public function getId_componente() {
        return $this->id_componente;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }
}
