<?php
error_reporting(0);
session_start();
include ('../src/conn/conexion.php');

if (isset($_POST['enviarNewProyecto'])) {

	//variables del formulario
	$nombreProyecto = $_POST['newProyecto'];

    $_SESSION['newProyecto'] = $nombreProyecto;
    header('Location: ../canvas.php');
}
?>

