<?php
	error_reporting(0);
  session_start();

// conexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colora";

// obtiene los datos de la solicitud post
$shapesJSON = file_get_contents("php://input");
$shapes = json_decode($shapesJSON, true);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$user = $_SESSION['usuario'];
$newProyecto = $_SESSION['newProyecto'];

// foreach de las figuras para las variables
foreach ($shapes as $shape) {
  $idShape = $shape['id'];
  $type = $shape['type'];
  $color = $shape['color'];
  $x = $shape['x'];
  $y = $shape['y'];
  $width = $shape['width'];
  $height = $shape['height'];
  $strokeColor = $shape['strokeColor'];
  $strokeWeight = $shape['strokeWeight'];
  $x1 = $shape['x1'];
  $y1 = $shape['y1'];
  $x2 = $shape['x2'];
  $y2 = $shape['y2'];
  $text = $shape['text'];
  $fontSize = $shape['fontSize'];

  // sql insert
  $sql = "INSERT INTO figuras (idShape, username, proyectoName, tipo, color, x, y, ancho, alto, strokeColor, strokeWeight, x1, y1, x2, y2, texto, fontSize) VALUES ('$idShape', '$user', '$newProyecto',  '$type', '$color', '$x', '$y', '$width', '$height', '$strokeColor', '$strokeWeight', '$x1', '$y1', '$x2', '$y2', '$text', '$fontSize')";

  if ($conn->query($sql) !== true) {
    echo "Error al guardar la figura en la base de datos: " . $conn->error;
  }
}

$conn->close();
?>