<?php
	error_reporting(0);
  session_start();
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
    
    <title>Corola</title>
</head>

<body>
  <div class="container-fluid px-0 container-canvas">
    <div class="row barTop d-flex align-items-center">
      <div class="col-1 px-4">
        <a href="pagina_destino.html">
          <img src="img/logo.png" alt="Botón" />
        </a>
      </div>
      <div class="col-11 text-center">
      <label><?php echo $_SESSION['newProyecto']; ?></label>
      </div>
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
        <div>
            <button id="save-button">Guardar</button>
        </div>
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
              <input type="text" id="fontSize" onchange="updateFiguraTamano()">
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
    }
  </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.min.js" integrity="sha512-3RlxD1bW34eFKPwj9gUXEWtdSMC59QqIqHnD8O/NoTwSJhgxRizdcFVQhUMFyTp5RwLTDL0Lbcqtl8b7bFAzog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="sketch.js"></script>
</body>
</html>