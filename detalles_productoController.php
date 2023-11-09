<?php
require 'producto.php';

// Aquí debes establecer la conexión a la base de datos
$producto = new Producto();

// Utiliza el ID del producto pasado a través de la URL
$id_producto = $_GET['id'];

// Obtén los detalles del producto
$result = $producto->obtenerDetallesProducto($id_producto);

// Cierra la conexión a la base de datos si es necesario
$producto->cerrarConexion(); // Debes implementar este método en tu clase

// Incluye la vista en la página
require 'detalles_producto_view.php';


?>
