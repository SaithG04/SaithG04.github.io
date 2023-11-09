<?php
require 'pedido.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pedido = new Pedido();

    $product_id = $_POST['producto_id'];
    $precio_x1 = $_POST['precio_x1'];
    $precio_x12 = $_POST['precio_x12'];
    $cantidad = $_POST['cantidad'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $forma_pago = $_POST['forma_pago'];


    $pedido->setCantidad($cantidad);
    $pedido->setFecha_entrega($fecha_entrega);

    $producto = $pedido->obtenerNombreProducto($product_id);
    $precio_total = $pedido->calcularPrecioTotal($precio_x1, $precio_x12);
    $fecha_pedido = date('Y-m-d');

    $pedido->setProducto($producto);
    $pedido->setFecha_pedido($fecha_pedido); // Establece la fecha de pedido como la fecha actual
    $pedido->setprecio_total($precio_total);

    if ($pedido->registrarPedido()) {
        // Redirige a la página de confirmación si el pedido se registró con éxito
        session_start(); // Inicia la sesión si aún no está iniciada

        // Guarda los detalles del pedido en variables de sesión
        $_SESSION['pedido_id'] = $pedido->getIdPedido();
        $_SESSION['producto'] = $pedido->getProducto();
        $_SESSION['cantidad'] = $pedido->getCantidad();
        $_SESSION['fecha_pedido'] = $pedido->getFecha_pedido();
        $_SESSION['fecha_entrega'] = $pedido->getFecha_entrega();
        $_SESSION['precio_total'] = $pedido->getprecio_total();

        // Redirige a la página de confirmación
        header("Location: confirmacion_pedido.php");
    } else {
        // Manejo de errores si no se pudo registrar el pedido
        echo "Error al registrar el pedido. Por favor, inténtalo de nuevo.";
    }
}
?>