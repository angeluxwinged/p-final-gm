<?php
error_reporting(0);
session_start();
include ('../src/conn/conexion.php');

$user = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colora</title>
</head>
<body>
    <h3><?php echo $user ?></h3>
    <form method="post">
        <label for="">Nuevo proyecto</label>
        <input type="text" id="newProyecto" name="newProyecto">
        <button type="submit" name="enviarNewProyecto">Crear</button>
    </form>

    <?php
    include ('../src/controllers/newProyectoController.php');
    ?>
</body>
</html>