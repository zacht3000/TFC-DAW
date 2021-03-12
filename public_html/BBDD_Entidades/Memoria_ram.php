<?php

require_once './database.php';

class Memoria_ram {

    private $db;
    private $id_componente;
    private $memoria_interna;
    private $tipo_memoria_interna;
    private $velocidad_reloj;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

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
