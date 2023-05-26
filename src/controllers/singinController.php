<?php
	error_reporting(0);
    session_start();
    include ('../src/conn/conexion.php');

    if (isset($_POST['enviarSingin'])) {
        // variables del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
    
        if (strlen($name) >= 1 && strlen($email) >= 1 && strlen($password) >= 1 && strlen($password2) >= 1) {
            if (strlen($password) == strlen($password2)) {
                // verificar si el nombre de usuario o correo ya existe en la tabla
                $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$name' OR correo = '$email'";
                $resultadoConsulta = mysqli_query($conectar, $consulta);

                if (mysqli_num_rows($resultadoConsulta) > 0) {
                    // nombre o correo ya existen
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Algo salió mal',
                            text: 'El nombre de usuario o correo ya está en uso, intenta uno diferente.'
                        })
                    </script>";
                } else {
                    // insertar datos en la tabla
                    $insertar = "INSERT INTO usuario VALUES(0, '$name', '$email', '$password')";
                    $resultado = mysqli_query($conectar, $insertar);

                    // accion realizada correctamente
                    if ($resultado) {
                        $_SESSION['usuario'] =  $name;
                        header('Location: loged.php');
                    } else {
                        // eror al insertar el registro
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Algo salió mal',
                                text: 'Error al crear la cuenta. Inténtalo nuevamente.'
                            })
                        </script>";
                    }
                }
            } else {
                // contraseñas no coinciden
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salió mal',
                        text: 'Las contraseñas introducidas no coinciden.'
                    })
                </script>";
            }
        } else {
            // no se han llenado todos los campos
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal',
                    text: 'Verifica que se han llenado todos los campos.'
                })
            </script>";
        }
    }
?>