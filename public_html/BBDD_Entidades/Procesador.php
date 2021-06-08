<?php
include_once($_SERVER['DOCUMENT_ROOT']."/database.php");

class Procesador {

    private $db;
    private $id_componente;
    private $frecuencia;
    private $socket;
    private $nucleos;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getProcesadores() {
        $query = $this->db->query("SELECT * FROM componente WHERE tipo = 'procesador'");

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getProcesadorGenerador($min, $max) {
        if($max > 0){
            $query = $this->db->query('SELECT p.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,p.socket, p.frecuencia, p.nucleos, c.tipo as "tipo_componente" FROM procesador p, componente c WHERE c.id = p.id_componente AND p.nucleos >= '. $min .' AND p.nucleos <= ' .$max . ' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        } else {
            $query = $this->db->query('SELECT p.id_componente, c.nombre, c.proveedor, c.precio_total, c.url_articulo,p.socket, p.frecuencia, p.nucleos, c.tipo as "tipo_componente" FROM procesador p, componente c WHERE c.id = p.id_componente AND p.nucleos = '. $min .' GROUP BY c.nombre ORDER BY c.precio_total LIMIT 1;');
        }

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO procesador(id_componente, frecuencia, socket, nucleos) 
                 VALUES($this->id_componente, 
                        $this->frecuencia, 
                        '$this->socket', 
                        $this->nucleos
                 )";

        return $this->db->query($query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM procesador WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */
    
    public function getId_componente() {
        return $this->id_componente;
    }

    public function getFrecuencia() {
        return $this->frecuencia;
    }

    public function getSocket() {
        return $this->socket;
    }

    public function getNucleos() {
        return $this->nucleos;
    }

    public function setId_componente($id_componente): void {
        $this->id_componente = $id_componente;
    }

    public function setFrecuencia($frecuencia): void {
        $this->frecuencia = $frecuencia;
    }

    public function setSocket($socket): void {
        $this->socket = $socket;
    }

    public function setNucleos($nucleos): void {
        $this->nucleos = $nucleos;
    }
}
