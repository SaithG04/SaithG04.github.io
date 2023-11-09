<?php
require 'conection.php';
class Pedido extends Conection
{
    private $id_pedido;
    private $producto;
    private $cantidad;
    private $fecha_pedido;
    private $fecha_entrega;
    private $precio_total;
    public function getIdPedido()
    {
        return $this->id_pedido;
    }
    public function getProducto()
    {
        return $this->producto;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }
    public function getFecha_entrega()
    {
        return $this->fecha_entrega;
    }
    public function getprecio_total()
    {
        return $this->precio_total;
    }
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }
    public function setProducto($producto)
    {
        $this->producto = $producto;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setFecha_pedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;
    }
    public function setFecha_entrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
    }
    public function setprecio_total($precio_total)
    {
        $this->precio_total = $precio_total;
    }

    public function registrarPedido()
    {
        $sql = "INSERT INTO pedidos (producto, cantidad, fecha_pedido, fecha_entrega, precio_total) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sissd", $this->producto, $this->cantidad, $this->fecha_pedido, $this->fecha_entrega, $this->precio_total);

            if ($stmt->execute()) {
                return true; // El pedido se registró correctamente
            } else {
                return false; // Ocurrió un error al registrar el pedido
            }
        } else {
            return false; // Error en la preparación de la consulta
        }
    }

    public function calcularPrecioTotal($precio_x1, $precio_x12)
    {
        if($this->cantidad>=6){
            return $this->cantidad * $precio_x12;
        }else{
            return $this->cantidad * $precio_x1;
        }
        
    }

    public function obtenerNombreProducto($productoId)
    {
        $sql = "SELECT nombre FROM productos WHERE id = ?";
        $stmt = $this->con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $productoId);
            $stmt->execute();
            $stmt->bind_result($this->producto);
            $stmt->fetch();
            $stmt->close();
            return $this->producto;
        }

        return ""; // Devuelve un valor predeterminado en caso de error
    }


    public function cerrarConexion()
    {
        $this->con->close();
    }
}

?>