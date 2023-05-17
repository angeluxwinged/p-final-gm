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
    <title>Welcome</title>
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 " style="background: rgba(255, 255, 255, 0.05);box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25), 0px 0px 15px rgba(0, 0, 0, 0.07);border-radius: 20px;">
                <a href="/" class="d-flex align-items-center mt-2 ms-4 pe-4 link-body-emphasis text-decoration-none" style="color: white;">
                    <span class="fs-3">colora</span>
                </a>
                <a href="/" class="d-flex align-items-center mt-2 ms-4 link-body-emphasis text-decoration-none" style="color: white;">
                    <span class="fs-6">Acerca de nosotros</span>
                </a>
                <nav class="d-inline-flex mt-2 ms-md-auto me-4">
                    <a class="nav-link me-3 mt-2" href="#" style="color: white;">Iniciar Sesión</a>
                    <button type="button" class="btn text-white" style="background-color: #ac2bac;">Unete Ahora</button>
                </nav>
            </div>
        </header>
        <main>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <div class="row">
                    <div class="col">
                        <h1 class="display-5 fw-bold text-light">Diseña</h1>
                    </div>
                    <div class="col">
                        <h1 class="display-5 fw-bold text-light">Rapido</h1>
                    </div>
                    <div class="col">
                        <h1 class="display-5 fw-bold text-light">&</h1>
                    </div>
                    <div class="col">
                        <h1 class="display-5 fw-bold text-light">Mejor</h1>
                    </div>
                </div>
                <p class="fs-5 text-light">El poder de la creatividad y la belleza se unen en nuestra innovadora plataforma de diseño,
da rienda suelta a tu imaginación y crea obras maestras visuales que cautivarán al mundo.
Regístrate ahora y dale vida a tus ideas.</p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$15<small class="text-body-secondary fw-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>20 users included</li>
                                <li>10 GB of storage</li>
                                <li>Priority email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Enterprise</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>30 users included</li>
                                <li>15 GB of storage</li>
                                <li>Phone and email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="display-6 text-center mb-4">Compare plans</h2>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 34%;"></th>
                            <th style="width: 22%;">Free</th>
                            <th style="width: 22%;">Pro</th>
                            <th style="width: 22%;">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Public</th>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Private</th>
                            <td></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Permissions</th>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Sharing</th>
                            <td></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Unlimited members</th>
                            <td></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Extra security</th>
                            <td></td>
                            <td></td>
                            <td><svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="../assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
                    <small class="d-block mb-3 text-body-secondary">&copy; 2017–2023</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>



</body>

</html>