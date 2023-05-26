<?php
error_reporting(0);
session_start();
include ('../src/conn/conexion.php');

$username = $_SESSION['usuario'];

if (strlen($_SESSION['usuario']) < 1) {
    header("Location: welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/loged.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">

    <title>Colora</title>
</head>
<body>
    <div class="row barTop d-flex align-items-center">
    <div class="col-12 px-4">
        <a href="loged.php">
            <img src="../img/logo.png" alt="Botón" />
        </a>
    </div>
    </div>
    

    <div class="container-fluid text-center">
    <div class="row d-flex justify-content-center">

        <div class="sideBar col-2">
            <h3>¡Bienvenido <?php echo $username ?>!</h3>
            <h4>Comienza a diseñar</h4>
        <form method="post">
            <label for="">Crea un uevo proyecto</label>
            <input type="text" id="newProyecto" name="newProyecto">
            <button class="btn text-white" type="submit" name="enviarNewProyecto" style="background-color: #9333EA">Crear</button>
        </form>

        <form method="post">
            <button class="btn btn-outline-light" type="submit" name="enviarCerrarSesion">Cerrar Sesión</button>
        </form>
        </div>
    

        <div class="col-10">
            <div class="row d-flex justify-content-center">
                <div class="col-12"></div>
                <?php
                include ('../src/controllers/logedController.php');
                ?>
            </div>
        
        </div>

    </div>
    </div>
</body>

<footer class="row" style="background: white; width: 100.6%;">
    <div class="col d-flex">
    <a href="#" class="d-flex fw-bold fs-4 text-dark mt-4 ms-5 link-body-emphasis text-decoration-none">
    colora
    </a>
    <p class="reserved fixed-bottom ms-5">&copy; 2023 colora, Inc. All rights reserved.</p>
    </div>
    <div class="col mb-3"></div>
    <div class="col mb-3">
    <ul class="nav flex-column">
        <li class="nav-item mb-2 mt-5"><a href="#" class="nav-link p-0 text-body-secondary">ACERCA DE NOSOTROS</a></li>
        <li class="nav-item mb-2 mt-1"><a href="#" class="nav-link p-0 text-dark">Nosotros</a></li>
    </ul>
    </div>

    <div class="col align-self-end pb-4">
    <a href="" class="link-body-emphasis text-decoration-none"><i class="m-2 bi bi-youtube"></i></a>
    <a href="" class="link-body-emphasis text-decoration-none"><i class="m-2 bi bi-facebook"></i></a>
    <a href="" class="link-body-emphasis text-decoration-none"><i class="m-2 bi bi-twitter"></i></a>
    <a href="" class="link-body-emphasis text-decoration-none"><i class="m-2 bi bi-instagram"></i></a>
    <a href="" class="link-body-emphasis text-decoration-none"><i class="m-2 bi bi-linkedin"></i></a>
    </div>
</footer>
</html>