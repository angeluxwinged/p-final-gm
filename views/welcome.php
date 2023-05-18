<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/config.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/welcome.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Welcome</title>
</head>

<body>
  <div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 " style="background: rgba(255, 255, 255, 0.05);box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25), 0px 0px 15px rgba(0, 0, 0, 0.07);border-radius: 20px;">
            <a href="/" class="d-flex align-items-center mt-2 ms-4 pe-4 link-body-emphasis text-decoration-none" style="color: white;">
                <span class="fs-3 fw-bold">colora</span>
            </a>
            <a href="/" class="d-flex align-items-center mt-2 ms-4 link-body-emphasis text-decoration-none" style="color: white;">
                <span class="fs-6">Acerca de nosotros</span>
            </a>
            <nav class="d-inline-flex mt-2 ms-md-auto me-4">
                <a class="nav-link me-3 mt-2" href="#" style="color: white;">Iniciar Sesión</a>
                <button type="button" class="btn text-white" style="background-color: #9333EA;">Unete Ahora</button>
            </nav>
        </div>
    </header>
    <main>
      <div class="pricing-header pt-2 md-4 mx-auto text-center">
          <div class="row">
              <div class="col d-flex justify-content-center">
                  <h1 class="display-5 fw-bold text-light">Diseña</h1>
                  <h1 class="display-5 fw-bold text-light ms-3" style="border-bottom: 3px solid #9333EA;">Rapido</h1>
                  <h1 class="display-5 fw-bold ms-3" style="color: #9333EA;">&</h1>
                  <h1 class="display-5 fw-bold text-light ms-3">Mejor</h1>
              </div>
          </div>
          <p class="fs-6 text-light mt-3 justify-content-center">
              El poder de la creatividad y la belleza se unen en nuestra innovadora plataforma de diseño,
              da rienda suelta a tu imaginación y crea obras maestras visuales que cautivarán al mundo.
              Regístrate ahora y dale vida a tus ideas.
          </p>
      </div>
      <div class="row mb-3 text-center">
          <div class="col">
          <button type="button" class="btn text-white me-2" style="background-color: #9333EA;">Unete Ahora</button>
          <button type="button" class="btn btn-outline-light">Ver tutorial</button>
          </div>
      </div>
      <img src="../img/Colora _ Inicio 1.png" class="m-4 pb-5 img-fluid rounded mx-auto d-block">
    </main>
  </div>
  <footer class="row" style="background: white; width: 100.6%;">
    <div class="col d-flex">
      <a href="#" class="d-flex fw-bold fs-4 text-dark mt-4 ms-5 link-body-emphasis text-decoration-none">
      colora
      </a>
      <p class="fixed-bottom ms-5">&copy; 2023 colora, Inc. All rights reserved.</p>
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
</body>

</html>