<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pedido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos (mismo código CSS que antes) */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>¡Pedido Registrado Exitosamente!</h1>
        <p>Tu pedido ha sido registrado con éxito. A continuación, te proporcionamos los detalles:</p>
        
        <table class="table">
            <tr>
                <th>Producto</th>
                <td><?php echo $_SESSION['producto']; ?></td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td><?php echo $_SESSION['cantidad']; ?></td>
            </tr>
            <tr>
                <th>Fecha de Pedido</th>
                <td><?php echo $_SESSION['fecha_pedido']; ?></td>
            </tr>
            <tr>
                <th>Fecha de Entrega</th>
                <td><?php echo $_SESSION['fecha_entrega']; ?></td>
            </tr>
            <tr>
                <th>Precio Total</th>
                <td><?php echo $_SESSION['precio_total']; ?></td>
            </tr>
        </table>
        <a class="btn btn-primary" href="productoController.php">Realizar otro pedido</a>
        <p>Gracias por elegir nuestros productos.</p>
    </div>
</body>
</html>
