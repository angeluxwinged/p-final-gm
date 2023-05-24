<?php 
	error_reporting(0);
    session_start();
    include ('../src/conn/conexion.php');

	if (isset($_POST['enviarLogin'])) {

	//variables del formulario
	$correo = $_POST['email'];
	$pass = $_POST['password'];

	if (strlen($correo) >= 1 && strlen($pass) >= 1) {

	$consulta = "SELECT * FROM usuario";
	$resultado = mysqli_query($conectar, $consulta);
	if($resultado){
		// introduce los resultados de la consulta en variables
		while($row = $resultado->fetch_array()){
			$sqlCorreo = $row['correo'];
			$sqlPass = $row['contraseña'];
            $user = $row['nombreUsuario'];

            // consulta al login exitosa
			if ($sqlCorreo == $correo && $sqlPass == $pass) {
                $_SESSION['usuario'] = $user;
                header('Location: loged.php');
			}
            
    // errores de consulta
	}if ($sqlCorreo != $correo && $sqlPass != $pass) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Algo salió mal',
            text: 'Verifica que el correo o contraseña introducidos son correctos.'
            })
            </script>";
    }
	}}else{
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Algo salió mal',
            text: 'Verifica que el usuario o contraseña introducidos son correctos.'
            })
            </script>";
        }
    }
    ?>