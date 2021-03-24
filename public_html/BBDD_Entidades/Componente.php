<?php
include($_SERVER['DOCUMENT_ROOT']."/Proyecto_Final_DAW/TFC-DAW\public_html/database.php");

class Componente {

    private $db;
    private $id;
    private $nombre;
    private $proveedor;
    private $precio_articulo;
    private $precio_total;
    private $url_imagen;
    private $url_articulo;
    private $tipo;

    public function __construct() {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes() {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getComponentesTipo($tipo) {
        $query = $this->db->query('SELECT * FROM (' . $tipo . ')');
        
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar() {
        $query = "INSERT INTO componente(id, nombre, proveedor, precio_articulo, precio_total, url_imagen, url_articulo, tipo) 
                 VALUES(NULL, '$this->nombre', 
                        '$this->proveedor', 
                        $this->precio_articulo, 
                        $this->precio_total, 
                        '$this->url_imagen', 
                        '$this->url_articulo', 
                        '$this->tipo')";
        if (!$this->db->query($query) === TRUE) {
            die("<br>Error: " . $query . "<br>" . $this->db->error);
        }
        
        return $this->db->insert_id;
    }

    public function eliminar($id) {
        $query = "DELETE FROM componente WHERE id=$id";

        return $this->db->query($query);
    }

    /*     * ************************************************** GETTERS AND SETTERS *************************************************** */

    public function getId() {
        $result = $this->db->query('SELECT id FROM componente order by id desc');
        return $result->fetch_array()['id'];
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getProveedor() {
        return $this->proveedor;
    }

    public function getPrecio_articulo() {
        return $this->precio_articulo;
    }

    public function getPrecio_total() {
        return $this->precio_total;
    }

    public function getUrl_imagen() {
        return $this->url_imagen;
    }

    public function getUrl_articulo() {
        return $this->url_articulo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setProveedor($proveedor): void {
        $this->proveedor = $proveedor;
    }

    public function setPrecio_articulo($precio_articulo): void {
        $this->precio_articulo = $precio_articulo;
    }

    public function setPrecio_total($precio_total): void {
        $this->precio_total = $precio_total;
    }

    public function setUrl_imagen($url_imagen): void {
        $this->url_imagen = $url_imagen;
    }

    public function setUrl_articulo($url_articulo): void {
        $this->url_articulo = $url_articulo;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

}
