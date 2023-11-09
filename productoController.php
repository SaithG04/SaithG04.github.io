<?php
require("producto.php");
$producto = new Producto();
$productos = $producto->obtenerProductos(); // Almacena los productos en una variable}
$producto->setRutaImagen('https://plazavea.vteximg.com.br/arquivos/ids/21396143-512-512/20010622.jpg');

require("productoView.php");
?>