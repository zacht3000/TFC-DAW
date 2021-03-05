<?php
require_once './database.php';

class Componente 
{
    private $db;

    private $nombre;
    private $descripcion;
    private $precio_pccom;
    private $precio_amazon;
    private $marca;
    private $tipo;
    private $url_pccom;
    private $url_amazon;
    private $url_imagen;

    public function __construct()
    {
        $this->db = DataBase::connect_db();
    }

    public function getComponentes()
    {
        $query = $this->db->query('SELECT * FROM componente');

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar()
    {
        $query = "INSERT INTO componente (id, nombre, descripcion, precio_pccom, precio_amazon, marca, tipo, url_pccom, url_amazon, url_imagen)
                    VALUES (NULL,
                    '$this->nombre',
                    '$this->descripcion',
                    $this->precio_pccom,
                    $this->precio_amazon,
                    '$this->marca',
                    '$this->tipo',
                    '$this->url_pccom',
                    '$this->url_amazon',
                    '$this->url_imagen')";

        return $this->db->query($query);
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM componente WHERE id=$id";

        return $this->db->query($query);
    }


    /**************************************************** GETTERS AND SETTERS ****************************************************/
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio_pccom()
    {
        return $this->precio_pccom;
    }

    public function setPrecio_pccom($precio_pccom)
    {
        $this->precio_pccom = $precio_pccom;

        return $this;
    }

    public function getPrecio_amazon()
    {
        return $this->precio_amazon;
    }

    public function setPrecio_amazon($precio_amazon)
    {
        $this->precio_amazon = $precio_amazon;

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $arrayTipo = array('refrigeracion_liquida','placa_base','procesador','disco_duro','tarjeta_grafica','memoria_ram','torres','fuente_alimentacion','refrigeracion_aire','refrigeracion_stock');
     
        for($i = 0; $i < count($arrayTipo); $i++){
            if($arrayTipo[$i] === $tipo) {
                 $this->tipo = $tipo;
                 return $this;
            }
        }
        die("No puedes insertar");
    }

    public function getUrl_pccom()
    {
        return $this->url_pccom;
    }

    public function setUrl_pccom($url_pccom)
    {
        $this->url_pccom = $url_pccom;

        return $this;
    }

    public function getUrl_amazon()
    {
        return $this->url_amazon;
    }

    public function setUrl_amazon($url_amazon)
    {
        $this->url_amazon = $url_amazon;

        return $this;
    }

    public function getUrl_imagen()
    {
        return $this->url_imagen;
    }
    
    public function setUrl_imagen($url_imagen)
    {
        $this->url_imagen = $url_imagen;

        return $this;
    }
}
