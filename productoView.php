<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .product-card {
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            margin: 10px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            max-width: 100%;
            height: auto;
        }

        .product-name {
            font-weight: bold;
            color: #333;
        }

        .product-price {
            color: #007bff;
        }

        /* Estilizar el botón de "Realizar Pedido" */
        .btn-pedido {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
        }

        .btn-pedido:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Bienvenido al Catálogo de Productos</h1>
    <div class="container">
        <div class="row">
            <?php
            foreach ($productos as $producto) {
                echo '<div class="col-md-4">';
                echo '<div class="product-card">';
                echo '<img src="' . $producto->getRutaImagen() . '" alt="' . $producto->getNombre() . '">';
                echo '<div class="product-name">' . $producto->getNombre() . '</div>';
                echo '<div class="product-price">Precio por unidad: S/' . $producto->getPrecioX1() . '</div>';
                echo '<div class="product-price">Precio por docena: S/' . $producto->getPrecioX12() . '</div>';
                // Agrega la clase "btn-pedido" al botón para aplicar los estilos
                echo '<a class="btn btn-pedido" href="detalles_productoController.php?id=' . $producto->getIdProducto() . '">Realizar Pedido</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>
