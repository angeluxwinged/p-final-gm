<?php
// crea nuevo proyecto
if (isset($_POST['enviarNewProyecto'])) {

    $nombreProyecto = $_POST['newProyecto'];
    if(strlen($nombreProyecto) >= 1){
        //variables del formulario

        $_SESSION['newProyecto'] = $nombreProyecto;
        echo '<script type="text/javascript">';
        echo 'window.location.href="../canvas.php";';
        echo '</script>';
    } else{
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Algo salió mal',
            text: 'Verifica que el nombre de tu proyecto sea correcto.'
            })
            </script>";
    }

}

// cerrar sesion
if (isset($_POST['enviarCerrarSesion'])) {
	session_destroy();
    echo '<script type="text/javascript">';
    echo 'window.location.href="welcome.php";';
    echo '</script>';
}

// depliega proyectos
$username = $_SESSION['usuario'];
$sql = "SELECT proyectoName FROM figuras WHERE username = '$username'";
$result = $conectar->query($sql);

if ($result->num_rows > 0) {
    $proyectos = array();

    while ($row = $result->fetch_assoc()) {
        $proyectoName = $row["proyectoName"];

        if (!in_array($proyectoName, $proyectos)) {
            $proyectos[] = $proyectoName;
            ?>
            <!-- itera los proyectos en la vista loged -->
            <div class="card text-center m-3" style="width: 330px">
            <div class="card-header">
                Tu Proyecto
            </div>
            <div class="card-body m-3">
            <form method="post">
                <h5 class="card-title"><?php echo $proyectoName ?></h5>
                <input type="hidden" id="updateProyecto" name="updateProyecto" value="<?php echo $proyectoName ?>">
                <button type="submit" name="enviarUpdateProyecto" class="btn text-white" style="background-color: #9333EA;">Acceder</button>
                </form>
            </div>
            <div class="card-footer text-muted">
            </div>
            </div>

            <?php
        }
    }
}

// update proyectos existentes
if (isset($_POST['enviarUpdateProyecto'])) {

	//variables del formulario
	$nombreProyecto = $_POST['updateProyecto'];

    $_SESSION['newProyecto'] = $nombreProyecto;
    echo '<script type="text/javascript">';
    echo 'window.location.href="../canvas.php";';
    echo '</script>';
}
?>

