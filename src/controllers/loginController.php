<?php 
	error_reporting(0);

    include ('../src/conn/conexion.php');

	if (isset($_POST['enviarLogin'])) {

	//variables del form
	$correo = $_POST['email'];
	$pass = $_POST['password'];

	if (strlen($correo) >= 1 && strlen($pass) >= 1) {

	$consulta = "SELECT * FROM usuario";
	$resultado = mysqli_query($conectar, $consulta);
	if($resultado){
		//introduce los resultados de la consulta en variables
		while($row = $resultado->fetch_array()){
			$sqlCorreo = $row['correo'];
			$sqlPass = $row['contraseña'];
            $sqlUser = $row['nombreUsuario'];

			if ($sqlCorreo == $correo && $sqlPass == $pass) {
				//redirecciona al usuario a la pagina de administrador
                echo "<script>
                var name = '$sqlUser';
                localStorage.clear();
                localStorage.setItem('usuarioColora', name);
                location.href = '';
            </script>";
			}
            
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