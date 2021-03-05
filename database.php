<?php

class DataBase
{
    public static function connect_db()
    {
        $host = 'proyectodawfinal.mysql.database.azure.com';
        $username = 'proyectoDAW@proyectodawfinal';
        $password = 'ysMC32Yi0nle';
        $db_name = 'proyecto_final_daw';
        $con = mysqli_connect($host, $username, $password, $db_name);

        if (mysqli_connect_error()) {
            die("La conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }

        return $con;
    }
}
