<?php

include($_SERVER['DOCUMENT_ROOT']."/database.php");

class Tarjeta_grafica {

    private $db;
    private $id_componente;
    private $vram;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getTarjetasGraficas() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'tarjeta_grafica'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
     public function getTarjetaGraficaGenerador($min, $max) {
        if($max > 0){
            $query = $this->db->query('SELECT tg.id_componente, c.nombre, c.proveedor, c.precio_total, tg.vram FROM tarjeta_grafica tg, componente c WHERE c.id = tg.id_componente AND tg.vram >= ' .$min . ' AND tg.vram <= ' .$max . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        } else {
            $query = $this->db->query('SELECT tg.id_componente, c.nombre, c.proveedor, c.precio_total, tg.vram FROM tarjeta_grafica tg, componente c WHERE c.id = tg.id_componente AND tg.vram = ' .$min . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        }

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
