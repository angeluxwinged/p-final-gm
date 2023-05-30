<?php
	error_reporting(0);
  session_start();
  include ('src/conn/conexion.php');

  $username = $_SESSION['usuario'];
  $proyectoName = $_SESSION['newProyecto'];

  if (strlen($_SESSION['usuario']) < 1) {
    header("Location: views/welcome.php");
}

  $sql = "SELECT idShape, tipo, color, x, y, ancho, alto, strokeColor, strokeWeight, x1, y1, x2, y2, texto, fontSize FROM figuras WHERE username = '$username' AND proyectoName = '$proyectoName'";
  $result = $conectar->query($sql);

  $shapes = array();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $shape = array(
              "id" => $row["idShape"],
              "type" => $row["tipo"],
              "color" => $row["color"],
              "x" => $row["x"],
              "y" => $row["y"],
              "width" => $row["ancho"],
              "height" => $row["alto"],
              "strokeColor" => $row["strokeColor"],
              "strokeWeight" => $row["strokeWeight"],
              "x1" => $row["x1"],
              "y1" => $row["y1"],
              "x2" => $row["x2"],
              "y2" => $row["y2"],
              "text" => $row["texto"],
              "fontSize" => $row["fontSize"]
          );

          $shapes[] = $shape;
      }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/canvas.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
    
    <title>Corola</title>
</head>

<body>
  <div class="container-fluid px-0 container-canvas">
    <div class="row barTop d-flex align-items-center">
      <div class="col-4 px-4">
        <a href="views/loged.php">
          <img src="img/logo.png" alt="Botón" />
        </a>
      </div>
      <div class="col-4">
        <div class="d-flex align-items-center justify-content-center">
          <label><?php echo $proyectoName; ?></label>
        </div>
      </div>
      <div class="col-4">
        <div class="d-flex justify-content-end px-2">
          <button class="btnSave text-white" style="background-color: #9333EA" id="save-button">Guardar proyecto</button>
        </div>
            
        </div>
      </div>
      <div>
    </div>
    
    <div class="row">
      <div class="col-1 capas"></div>

      <div class="col-8 px-0">
        <div id="p5js-container" class="p5js-container no-padding">
          <div class="figuras">
            <button id="rect-button" class="boton-figuras" onclick="toggleRect()"></button>
            <button id="ellipse-button" class="boton-figuras" onclick="toggleEllipse()"></button>
            <button id="line-button" class="boton-figuras" onclick="toggleLine()"></button>
            <button id="text-button" class="boton-figuras" onclick="toggleText()"></button>
          </div>
        </div>
      </div>

      <div class="col-3 p-4 mod-inputs">
        <div class="mostrar-color-Opaci">
          <label for="">Edición de figura</label>
          <div>
            <label for="shape-color">Color:</label>
            <input type="color" id="shape-color" onchange="updateShapeColor()" value="#0F0F0F">
            <label for="shape-opacity">Opacidad:</label>
            <input type="number" id="shape-opacity" min="0" max="255" onchange="updateShapeOpacity()" value="255">
          </div>
          <hr>
        </div>

        <div class="mostrat-bordes">
          <label for="">Edición de borde</label>
          <div>
            <label for="shape-stroke-color">Color:</label>
            <input type="color" id="shape-stroke-color" onchange="updateShapeStrokeColor()" value="#DEDEDE">
            <label for="shape-stroke-opacity">Opacidad:</label>
            <input type="number" id="shape-stroke-opacity" min="0" max="255" onchange="updateShapeStrokeOpacity()" value="255">
            <label for="shape-stroke-weight">Grosor:</label>
            <input type="number" id="shape-stroke-weight" onchange="updateShapeStrokeWeight()" value="2">
          </div>
          <hr>
        </div>

        <div class="coordenadas-lineas">
          <label for="">Coordenadas</label>
          <div>
            <label >X1:</label>
            <input id="x1" type="number" onchange="updateShapeLines()">
            <label >Y1:</label>
            <input id="y1" type="number" onchange="updateShapeLines()">
            <label >X2:</label>
            <input id="x2" type="number" onchange="updateShapeLines()">
            <label >Y2:</label>
            <input id="y2" type="number" onchange="updateShapeLines()">
          </div>
        </div>

          <div class="mostrar-coordenadas">
            <label for="">Coordenadas</label>
            <div>
              <label for="shape-x">Coordenada X:</label>
              <input type="number" id="shape-x" onchange="updateShapeCoordinates()">
      
              <label for="shape-y">Coordenada Y:</label>
              <input type="number" id="shape-y" onchange="updateShapeCoordinates()">
            </div>
            <hr>
          </div>
    
          <div class="mostrar-dimension">
            <label for="">Dimensión</label>
            <div>
              <label for="shape-x">Anchura:</label>
              <input type="number" id="ancho" onchange="updateShapeSize()">
      
              <label for="shape-y">Altura:</label>
              <input type="number" id="alto" onchange="updateShapeSize()">
            </div>
          </div>
    
          <div class="mostrar-texto">
            <label for="">Fuente</label>
            <div>
              <label for="texto">Texto:</label>
              <input type="text" id="texto" oninput="updateShapeText()" />
              <label for="fontSize">Tamaño:</label>
              <input type="number" id="fontSize" onchange="updateFiguraTamano()">
            </div>
          </div>
      </div>
    </div>
  </div>

  <script>
    // botones para aparecer y desaparecer elementos
    function toggleRect() {
    let coordenadasLine = document.getElementsByClassName('coordenadas-lineas');
    let coordenadas = document.getElementsByClassName('mostrar-coordenadas');
    let texto = document.getElementsByClassName('mostrar-texto');
    let demensiones = document.getElementsByClassName('mostrar-dimension');
    let colorYOpaci = document.getElementsByClassName('mostrar-color-Opaci');
    let bordes = document.getElementsByClassName('mostrat-bordes');

    for (let i = 0; i < coordenadasLine.length; i++) {
      coordenadasLine[i].style.display = 'none';
      }
    for (let i = 0; i < coordenadas.length; i++) {
      coordenadas[i].style.display = 'block';
    }
    for (let i = 0; i < texto.length; i++) {
      texto[i].style.display = 'none';
    }
    for (let i = 0; i < demensiones.length; i++) {
      demensiones[i].style.display = 'block';
    }
    for (let i = 0; i < colorYOpaci.length; i++) {
      colorYOpaci[i].style.display = 'block';
    }
    for (let i = 0; i < bordes.length; i++) {
      bordes[i].style.display = 'block';
    }

    // pinta y desactiva borde de los botones
    var rectBtn = document.getElementById("rect-button");
    var ellipseBtn = document.getElementById("ellipse-button");
    var lineBtn = document.getElementById("line-button");
    var textBtn = document.getElementById("text-button");
  
    rectBtn.style.border = "1px solid #fff";
    ellipseBtn.style.border = "none";
    lineBtn.style.border = "none";
    textBtn.style.border = "none";
    }

    function toggleEllipse() {
    let coordenadasLine = document.getElementsByClassName('coordenadas-lineas');
    let coordenadas = document.getElementsByClassName('mostrar-coordenadas');
    let texto = document.getElementsByClassName('mostrar-texto');
    let demensiones = document.getElementsByClassName('mostrar-dimension');
    let colorYOpaci = document.getElementsByClassName('mostrar-color-Opaci');
    let bordes = document.getElementsByClassName('mostrat-bordes');

    for (let i = 0; i < coordenadasLine.length; i++) {
      coordenadasLine[i].style.display = 'none';
      }
    for (let i = 0; i < coordenadas.length; i++) {
      coordenadas[i].style.display = 'block';
    }
    for (let i = 0; i < texto.length; i++) {
      texto[i].style.display = 'none';
    }
    for (let i = 0; i < demensiones.length; i++) {
      demensiones[i].style.display = 'block';
    }
    for (let i = 0; i < colorYOpaci.length; i++) {
      colorYOpaci[i].style.display = 'block';
    }
    for (let i = 0; i < bordes.length; i++) {
      bordes[i].style.display = 'block';
    }
    
    // pinta y desactiva borde de los botones
    var rectBtn = document.getElementById("rect-button");
    var ellipseBtn = document.getElementById("ellipse-button");
    var lineBtn = document.getElementById("line-button");
    var textBtn = document.getElementById("text-button");
  
    rectBtn.style.border = "none";
    ellipseBtn.style.border = "1px solid #fff";
    lineBtn.style.border = "none";
    textBtn.style.border = "none";
    }

    function toggleLine() {
    let coordenadasLine = document.getElementsByClassName('coordenadas-lineas');
    let coordenadas = document.getElementsByClassName('mostrar-coordenadas');
    let texto = document.getElementsByClassName('mostrar-texto');
    let demensiones = document.getElementsByClassName('mostrar-dimension');
    let colorYOpaci = document.getElementsByClassName('mostrar-color-Opaci');
    let bordes = document.getElementsByClassName('mostrat-bordes');

    for (let i = 0; i < coordenadasLine.length; i++) {
      coordenadasLine[i].style.display = 'block';
      }
    for (let i = 0; i < coordenadas.length; i++) {
      coordenadas[i].style.display = 'none';
    }
    for (let i = 0; i < texto.length; i++) {
      texto[i].style.display = 'none';
    }
    for (let i = 0; i < demensiones.length; i++) {
      demensiones[i].style.display = 'none';
    }
    for (let i = 0; i < colorYOpaci.length; i++) {
      colorYOpaci[i].style.display = 'none';
    }
    for (let i = 0; i < bordes.length; i++) {
      bordes[i].style.display = 'block';
    }

    // pinta y desactiva borde de los botones
    var rectBtn = document.getElementById("rect-button");
    var ellipseBtn = document.getElementById("ellipse-button");
    var lineBtn = document.getElementById("line-button");
    var textBtn = document.getElementById("text-button");
  
    rectBtn.style.border = "none";
    ellipseBtn.style.border = "none";
    lineBtn.style.border = "1px solid #fff";
    textBtn.style.border = "none";
    }

    function toggleText() {
    let coordenadasLine = document.getElementsByClassName('coordenadas-lineas');
    let coordenadas = document.getElementsByClassName('mostrar-coordenadas');
    let texto = document.getElementsByClassName('mostrar-texto');
    let demensiones = document.getElementsByClassName('mostrar-dimension');
    let colorYOpaci = document.getElementsByClassName('mostrar-color-Opaci');
    let bordes = document.getElementsByClassName('mostrat-bordes');

    for (let i = 0; i < coordenadasLine.length; i++) {
      coordenadasLine[i].style.display = 'none';
      }
    for (let i = 0; i < coordenadas.length; i++) {
      coordenadas[i].style.display = 'block';
    }
    for (let i = 0; i < texto.length; i++) {
      texto[i].style.display = 'block';
    }
    for (let i = 0; i < demensiones.length; i++) {
      demensiones[i].style.display = 'none';
    }
    for (let i = 0; i < colorYOpaci.length; i++) {
      colorYOpaci[i].style.display = 'block';
    }
    for (let i = 0; i < bordes.length; i++) {
      bordes[i].style.display = 'block';
    }

    // pinta y desactiva borde de los botones
    var rectBtn = document.getElementById("rect-button");
    var ellipseBtn = document.getElementById("ellipse-button");
    var lineBtn = document.getElementById("line-button");
    var textBtn = document.getElementById("text-button");
  
    rectBtn.style.border = "none";
    ellipseBtn.style.border = "none";
    lineBtn.style.border = "none";
    textBtn.style.border = "1px solid #fff";
    }
  </script>

  <script>
    var shapesArray = <?php echo json_encode($shapes); ?>;
  </script>

    <?php
    include ('guardarFiguras.php');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.min.js" integrity="sha512-3RlxD1bW34eFKPwj9gUXEWtdSMC59QqIqHnD8O/NoTwSJhgxRizdcFVQhUMFyTp5RwLTDL0Lbcqtl8b7bFAzog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="sketch.js"></script>
</body>

<footer class="row" style="background: white; width: 100.6%;">
    <div class="col d-flex">
    <a href="#" class="d-flex fw-bold fs-4 text-dark mt-4 ms-5 link-body-emphasis text-decoration-none">
    colora
    </a>
    <p class="reserved fixed-bottom ms-5">&copy; 2023 colora, Inc. All rights reserved.</p>
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
</html>