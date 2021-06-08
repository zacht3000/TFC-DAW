<?php
include_once($_SERVER['DOCUMENT_ROOT']."/database.php");

class Memoria_ram {

    private $db;
    private $id_componente;
    private $memoria_interna;
    private $tipo_memoria_interna;
    private $velocidad_reloj;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getMemoriasRam() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'memoria_ram'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getMemoriaGenerador($min, $max) {
        if($max > 0){
            $query = $this->db->query('SELECT  mr.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,mr.memoria_interna, c.tipo as "tipo_componente" FROM memoria_ram mr, componente c WHERE c.id = mr.id_componente AND mr.memoria_interna >= ' .$min . ' AND mr.tipo_memoria_interna LIKE "DDR4" AND mr.memoria_interna <= ' .$max . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        } else {
            $query = $this->db->query('SELECT  mr.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,mr.memoria_interna, c.tipo as "tipo_componente" FROM memoria_ram mr, componente c WHERE c.id = mr.id_componente AND mr.memoria_interna = ' .$min . ' AND mr.tipo_memoria_interna LIKE "DDR4" GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        }

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO memoria_ram(id_componente, memoria_interna, tipo_memoria_interna, velocidad_reloj) 
                 VALUES($this->id_componente, 
                        '$this->memoria_interna', 
                        '$this->tipo_memoria_interna',
                        '$this->velocidad_reloj'
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM memoria_ram WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId_componente() {
        return $this->id_componente;
    }

    public function getMemoria_interna() {
        return $this->memoria_interna;
    }

    public function getTipo_memoria_interna() {
        return $this->tipo_memoria_interna;
    }

    public function getVelocidad_reloj() {
        return $this->velocidad_reloj;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setMemoria_interna($memoria_interna): void {
        $this->memoria_interna = $memoria_interna;
    }

    public function setTipo_memoria_interna($tipo_memoria_interna): void {
        $this->tipo_memoria_interna = $tipo_memoria_interna;
    }

    public function setVelocidad_reloj($velocidad_reloj): void {
        $this->velocidad_reloj = $velocidad_reloj;
    }

}
