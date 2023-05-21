<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Registrarse</title>
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <div class="row">
            <div class="col">
                <p class="fs-6"><a href="./welcome.php" style="color: #7034E4;" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-10-hover">colora</a></p>
            </div>
        </div>
        <div class="row">
            <form>
                <div class="row mb-4" style="color: #421C86;">
                    <p class="fs-1 fw-normal">¿Listo para Empezar?</p>
                </div>
                <div class="form-floating">
                    <input type="name" class="form-control" id="name" placeholder="Nombre">
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="emial" placeholder="name@example.com">
                    <label for="floatingInput">Correo Electronico</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password.2" placeholder="Password">
                    <label for="floatingPassword">Confirmar Contraseña</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" style="background-color: #7034E4;" type="submit">Registrarse</button>
                <a href="" style="color: #7034E4;"><p class="mt-5 mb-3 text-body-secondary" style="color: #7034E4;">¿Ya tienes una cuenta?</p></a>
            </form>
        </div>
    </main>
</body>

</html>