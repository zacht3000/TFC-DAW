<?php

include_once($_SERVER['DOCUMENT_ROOT']."/database.php");

class Caja {

    private $db;
    private $id_componente;
    private $tipo_placa_base;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getCajas() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'caja'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO caja(id_componente, tipo_placa_base) 
                 VALUES($this->id_componente, 
                        '$this->tipo_placa_base'       
                 )";

        return $this->db->query($query);
    }
    
    public function getCajaGenerador($min) {
        $query = $this->db->query('SELECT  cj.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo, cj.tipo_placa_base, c.tipo as "tipo_componente" FROM caja cj, componente c WHERE c.id = cj.id_componente AND cj.tipo_placa_base LIKE \'' . $min . '\' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminar($id) {
        $query = "DELETE FROM caja WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId_componente() {
        return $this->id_componente;
    }

    public function getTipo_placa_base() {
        return $this->tipo_placa_base;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setTipo_placa_base($tipo_placa_base): void {
        $this->tipo_placa_base = $tipo_placa_base;
    }

}
