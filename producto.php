<?php
require 'conection.php';
class Producto extends Conection
{
    private $id_producto;
    private $nombre;
    private $precio_x1;
    private $precio_x12;
    private $ruta_imagen;
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecioX1()
    {
        return $this->precio_x1;
    }

    public function getPrecioX12()
    {
        return $this->precio_x12;
    }

    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPrecioX1($precio_x1)
    {
        $this->precio_x1 = $precio_x1;
    }

    public function setPrecioX12($precio_x12)
    {
        $this->precio_x12 = $precio_x12;
    }
    public function getRutaImagen()
    {
        return $this->ruta_imagen;
    }

    public function setRutaImagen($ruta)
    {
        $this->ruta_imagen = $ruta;
    }
    // Método para obtener información de un producto por su ID
    // En la clase Producto
    public function obtenerProductos()
    {
        $sql = "SELECT id, nombre, precio_x1, precio_x12, ruta_imagen FROM productos";
        $result = $this->con->query($sql);

        $productos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $producto = new Producto();
                $producto->setIdProducto($row['id']);
                $producto->setNombre($row['nombre']);
                $producto->setPrecioX1($row['precio_x1']);
                $producto->setPrecioX12($row['precio_x12']);
                $producto->setRutaImagen($row['ruta_imagen']);
                $productos[] = $producto;
            }
        }

        return $productos;
    }
    public function obtenerDetallesProducto($id_producto)
    {
        // Coloca aquí la lógica para obtener los detalles del producto
        // Utiliza el ID del producto pasado como argumento

        // Puedes reutilizar la lógica que utilizaste en el controlador para obtener los detalles

        ob_start(); // Iniciar el almacenamiento en búfer de salida

        // Aquí muestras los detalles del producto obtenidos de la base de datos
        // Utiliza el ID del producto pasado a través de la URL para recuperar los detalles específicos del producto

        // Lógica para obtener los detalles del producto en función del ID del producto
        // Debes incluir la lógica para conectarte a la base de datos y obtener los detalles del producto.
        // Por ejemplo, asumiendo que tienes una conexión a la base de datos llamada $conn:
        $sql = "SELECT nombre, precio_x1, precio_x12 FROM productos WHERE id = $id_producto";
        $result = $this->con->query($sql);
        return $result;
    }



    public function cerrarConexion()
    {
        $this->con->close();
    }
}
?>