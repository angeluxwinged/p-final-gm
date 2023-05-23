<?php
        error_reporting(0);

        include ('../src/conn/conexion.php');

        if (isset($_POST['enviarSingin'])) {

            //variables del form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
        
            if (strlen($name) >= 1 && strlen($email) >= 1 && strlen($password) >= 1  && strlen($password2) >= 1) {
            
            if(strlen($password) == strlen($password2)){
            
            //inserta datos en tabla
            $insertar = "INSERT INTO usuario VALUES(0, '$name', '$email', '$password')";
            $resultado = mysqli_query($conectar, $insertar);

            //accion realizada correctamente
            if($resultado){
                ?><script>
                var name = "<?php echo $name; ?>";
                // localStorage.clear();
                // localStorage.setItem("usuarioColora", name);
                // location.href ='';
                </script>
                <?php
        
            }else{//nombre de usuario repetido
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal',
                    text: 'El nombre de usuario o el correo ya esta en uso, intenta uno diferente.'
                    })
                    </script>";
        
            }}else{//contras no coinciden
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal',
                    text: 'Las contraseñas introducidas no coinciden.'
                    })
                    </script>";

            }}else{//no se han llenado todos los campos
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