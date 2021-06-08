<?php

include_once($_SERVER['DOCUMENT_ROOT']."/database.php");

class Fuente_alimentacion {

    private $db;
    private $id_componente;
    private $potencia;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getFuentesAlimentacion() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'fuente_alimentacion'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getFuenteAlimentacionGenerador($min, $max) {
        if($max > 0){
            $query = $this->db->query('SELECT  fa.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,fa.potencia, c.tipo as "tipo_componente" FROM fuente_alimentacion fa, componente c WHERE c.id = fa.id_componente AND fa.potencia >= ' .$min . ' AND fa.potencia <= ' .$max . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        } else {
            $query = $this->db->query('SELECT  fa.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,fa.potencia, c.tipo as "tipo_componente" FROM fuente_alimentacion fa, componente c WHERE c.id = fa.id_componente AND fa.potencia = ' .$min . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        }

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
