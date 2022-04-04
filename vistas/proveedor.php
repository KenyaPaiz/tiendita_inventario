<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilo-nav.css">
    <link rel="stylesheet" href="../recursos/css/estilo-registrar-proveedor.css">
   
    <title>Ver Proveedor</title>
</head>
<body>
    <header class="encabezado">
        <nav>

                <div class="div-nav">
                    <a class="nav" href="../menu.php">Menu</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="categoria.php">Categoria</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="marca.php">Marca</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="ver_producto.php">Producto</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="proveedor.php">Proveedor</a>
                </div>

                <div class="div-nav">
                    <a class="nav" href="registrar_producto.php">Registrar producto</a>
                </div>
            
        </nav>
    </header>
    <div class="container">
        <?php
            require('../clases/proveedor.php');
            $proveedor = new Proveedor();
        ?>
        <h1 class="h1-contenedor">Registro de Proveedores</h1>
        <form class="form" action="" method="POST">
            <label class="label-text" for=""><b>Nombre:</b></label>
            <input class="imput-text" type="text" name="nombre" placeholder="Digite su nombre">
            <label class="label-text" for=""><b>Direccion:</b></label>
            <input class="imput-text" type="text" name="direccion" placeholder="Digite su direccion">
            <label class="label-text" for=""><b>Telefono:</b></label>
            <input class="imput-text" type="text" name="telefono" placeholder="Digite su telefono">
            <input type="submit" name="registrar" class="btn btn-dark" value="Registrar Proveedor" id="button">
        </form>
        <?php $proveedor->registrar(); ?>
        <!--- Tabla de consultas -->
        <br>
        <table class="tabla">
            <thead>
                <th class="th">#</th>
                <th class="th">Nombre</th>
                <th class="th">Direccion</th>
                <th class="th">Telefono</th>
                <th class="th">Accion</th>
            </thead>
            <tbody>
                <?php $proveedor->consultar(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>