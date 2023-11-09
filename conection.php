<?php
// Establece la conexión con la base de datos
class Conection
{

    protected $con;

    public function __construct()
    {
        $this->con = new mysqli("localhost", "owner", "", "catalogo");
        if ($this->con->connect_error) {
            die("Error de conexión a la base de datos: " . $this->con->connect_error);
        }
    }

}
?>