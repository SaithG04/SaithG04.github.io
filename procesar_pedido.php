<?php
// Obtén el ID del producto y la cantidad desde la solicitud del cliente
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

// Consulta la base de datos para obtener el precio de x1 y x12 del producto
$sql = "SELECT precio_x1, precio_x12 FROM productos WHERE id = $producto_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $precio_x1 = $row['precio_x1'];
    $precio_x12 = $row['precio_x12'];

    // Calcula el precio total según la cantidad
    if ($cantidad < 6) {
        $precio_total = $precio_x1 * $cantidad;
    } else {
        $precio_total = $precio_x12 * $cantidad;
    }

    // Inserta el registro en la tabla de pedidos
    $sql = "INSERT INTO pedidos (producto_id, cantidad, precio_total) VALUES ($producto_id, $cantidad, $precio_total)";
    if ($conn->query($sql) === TRUE) {
        // Éxito: el pedido se ha registrado en la base de datos
        echo "Pedido registrado exitosamente.";
    } else {
        echo "Error al registrar el pedido: " . $conn->error;
    }
} else {
    echo "Producto no encontrado en la base de datos.";
}
?>