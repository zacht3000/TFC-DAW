<?php

class DataBase {

    private $servername = "localhost";
    private $username = "id16336260_proyectodawuser";
    private $password = "xsu66MA!$(K%2ga&";
    private $database = "id16336260_proyecto_final_daw";

    public static function connect_db() {
        $con = mysqli_connect("localhost", "id16336260_proyectodawuser", "xsu66MA!$(K%2ga&", "id16336260_proyecto_final_daw");

        if (mysqli_connect_error()) {
            die("La conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
        return $con;
    }

}
