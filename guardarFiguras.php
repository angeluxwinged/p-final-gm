<?php
error_reporting(0);
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colora";

// obtiene los datos de la solicitud POST
$shapesJSON = file_get_contents("php://input");
$shapes = json_decode($shapesJSON, true);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$user = $_SESSION['usuario'];
$newProyecto = $_SESSION['newProyecto'];

// verificar el idShape mayor en la tabla
$query = "SELECT MAX(idShape) AS maxId FROM figuras WHERE username = '$user' AND proyectoName = '$newProyecto'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$maxId = $row['maxId'];

if (is_null($maxId)) {
    $maxId = 1;
} else {
    $maxId = $maxId + 1;
}

echo "<script>var maxId = " . $maxId . ";</script>";

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

    // verifica si el registro ya existe en la tabla
    $query = "SELECT * FROM figuras WHERE idShape = '$idShape' AND username = '$user' AND proyectoName = '$newProyecto'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // el registro ya existe, realizar una operación de actualización
        $updateQuery = "UPDATE figuras SET tipo = '$type', color = '$color', x = '$x', y = '$y', ancho = '$width', alto = '$height', strokeColor = '$strokeColor', strokeWeight = '$strokeWeight', x1 = '$x1', y1 = '$y1', x2 = '$x2', y2 = '$y2', texto = '$text', fontSize = '$fontSize' WHERE idShape = '$idShape' AND username = '$user' AND proyectoName = '$newProyecto'";

        if ($conn->query($updateQuery) !== true) {
            echo "Error al actualizar la figura en la base de datos: " . $conn->error;
        }
    } else {
        // el registro no existe, realizar una operación de inserción
        $insertQuery = "INSERT INTO figuras (idShape, username, proyectoName, tipo, color, x, y, ancho, alto, strokeColor, strokeWeight, x1, y1, x2, y2, texto, fontSize) VALUES ('$idShape', '$user', '$newProyecto',  '$type', '$color', '$x', '$y', '$width', '$height', '$strokeColor', '$strokeWeight', '$x1', '$y1', '$x2', '$y2', '$text', '$fontSize')";

        if ($conn->query($insertQuery) !== true) {
            echo "Error al guardar la figura en la base de datos: " . $conn->error;
        }
    }
}

$conn->close();
?>