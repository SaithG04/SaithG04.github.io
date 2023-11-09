<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos (mismo código CSS que antes) */
    </style>
</head>
<body>
<div class="container mt-5">
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_producto = $row['nombre'];
            $precio_x1 = $row['precio_x1'];
            $precio_x12 = $row['precio_x12'];

            echo "<h1>Detalles del Producto</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombre del Producto</th>";
            echo "<td>$nombre_producto</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Precio x1</th>";
            echo "<td>$$precio_x1</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Precio x12</th>";
            echo "<td>$$precio_x12</td>";
            echo "</tr>";
            echo "</table>";

            echo "<h2>Realizar Pedido</h2>";
            echo "<form method='POST' action='pedidoController.php'>";
            echo "<input type='hidden' name='producto_id' value='$id_producto'>"; // Enviar el ID del producto
            echo "<input type='hidden' name='precio_x1' value='$precio_x1'>"; // Enviar el precio x1 del producto
            echo "<input type='hidden' name='precio_x12' value='$precio_x12'>"; // Enviar el precio x12 del producto
            echo "<div class='form-group'>";
            echo "<label for='cantidad'>Cantidad:</label>";
            echo "<input type='number' class='form-control' name='cantidad' id='cantidad' min='1' max='12' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='fecha_entrega'>Fecha de Entrega:</label>";
            echo "<input type='date' class='form-control' name='fecha_entrega' id='fecha_entrega' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='forma_pago'>Forma de Pago:</label>";
            echo "<select class='form-control' name='forma_pago' id='forma_pago' required>";
            echo "<option value='Efectivo'>Efectivo</option>";
            echo "<option value='Efectivo'>Transferencia bancaria</option>";
            echo "<option value='Efectivo'>YAPE</option>";
            echo "<option value='Efectivo'>PLIN</option>";
            echo "</select>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Realizar Pedido</button>";
            echo "<button class='btn btn-back' onclick='history.back()'>Regresar</button>";
            echo "</form>";
        }
        ?>
    </div>
</body>
</html>
