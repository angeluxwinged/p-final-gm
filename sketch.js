let shapes = [];
let selectedShape = null;
let nextShapeId = 1;
let currentShape = 'rectangle';
let canvasWidth = document.getElementById('p5js-container').clientWidth;
let canvasHeight = document.getElementById('p5js-container').clientHeight;
let lastSelectedShape = null;
let isCtrlPressed = false;

function setup() {
  const canvas = createCanvas(windowWidth-300, windowHeight-150);
  canvas.parent('p5js-container');
  
  // llama a los botones de las formas
  const rectButton = document.getElementById("rect-button");
  const ellipseButton = document.getElementById("ellipse-button");
  const lineButton = document.getElementById("line-button");
  const textButton = document.getElementById("text-button");
  rectButton.addEventListener("click", () => setShapeType('rectangle'));
  ellipseButton.addEventListener("click", () => setShapeType('ellipse'));
  lineButton.addEventListener("click", () => setShapeType('line'));
  textButton.addEventListener("click", () => setShapeType('text'));

  // cambio de valores a tiempo real
  const x1Input = document.getElementById("x1");
  x1Input.addEventListener("input", updateShapeLines);
  const y1Input = document.getElementById("y1");
  y1Input.addEventListener("input", updateShapeLines);
  const x2Input = document.getElementById("x2");
  x2Input.addEventListener("input", updateShapeLines);
  const y2Input = document.getElementById("y2");
  y2Input.addEventListener("input", updateShapeLines);
  const textInput = document.getElementById("texto");
  textInput.addEventListener("input", updateShapeText);
  const fontSizeInput = document.getElementById("fontSize");
  fontSizeInput.addEventListener("input", updateFiguraTamano);
  const widthInput = document.getElementById("ancho");
  widthInput.addEventListener("input", updateShapeSize);
  const heightInput = document.getElementById("alto");
  heightInput.addEventListener("input", updateShapeSize);
  const colorInput = document.getElementById("shape-color");
  colorInput.addEventListener("input", updateShapeColor);
  const opacityInput = document.getElementById("shape-opacity");
  opacityInput.addEventListener("input", updateShapeOpacity);
  const colorStrokeInput = document.getElementById("shape-stroke-color");
  colorStrokeInput.addEventListener("input", updateShapeStrokeColor);
  const opacityStrokeInput = document.getElementById("shape-stroke-opacity");
  opacityStrokeInput.addEventListener("input", updateShapeStrokeOpacity);
  const weightStrokeInput = document.getElementById("shape-stroke-weight");
  weightStrokeInput.addEventListener("input", updateShapeStrokeWeight);
  const coorX = document.getElementById("shape-x");
  coorX.addEventListener("input", updateShapeCoordinates);
  const coorY = document.getElementById("shape-y");
  coorY.addEventListener("input", updateShapeCoordinates);
  
   // events del teclado
  document.addEventListener("keydown", handleKeyDown);
  document.addEventListener("keyup", handleKeyUp);
}

document.getElementById("save-button").addEventListener("click", saveShapes);

function saveShapes() {
  const shapesJSON = JSON.stringify(shapes);

  const xhr = new XMLHttpRequest();

  const url = "guardarFiguras.php";

  xhr.open("POST", url, true);

  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log("Figuras guardadas en la base de datos.");
    } else {
      console.log("Error al guardar las figuras en la base de datos.");
    }
  };

  xhr.send(shapesJSON);
}

function draw() {
  background(30,30,30);
  
  // dibuja las figuras
  for (let shape of shapes) {
    strokeWeight(shape.strokeWeight);
    stroke(shape.strokeColor);
    
    if (shape.type === 'ellipse') {
      fill(shape.color);
      ellipse(shape.x, shape.y, shape.width, shape.height);
    } else if (shape.type === 'rectangle') {
      fill(shape.color);
      rect(shape.x, shape.y, shape.width, shape.height);
    } else if (shape.type === 'line') {
      line(shape.x1, shape.y1, shape.x2, shape.y2);
    } else if (shape.type === 'text') {
      fill(shape.color);
      textSize(shape.fontSize);
      text(shape.text, shape.x, shape.y);
    }
  }

  if (selectedShape) {
    document.getElementById("ancho").value = Math.floor(selectedShape.width);
    document.getElementById("alto").value = Math.floor(selectedShape.height);
    document.getElementById("shape-x").value = Math.floor(selectedShape.x);
    document.getElementById("shape-y").value = Math.floor(selectedShape.y);
    document.getElementById("x1").value = Math.floor(selectedShape.x1);
    document.getElementById("y1").value = Math.floor(selectedShape.y1);
    document.getElementById("x2").value = Math.floor(selectedShape.x2);
    document.getElementById("y2").value = Math.floor(selectedShape.y2);
    document.getElementById("texto").value = selectedShape.text;
    document.getElementById("fontSize").value = Math.floor(selectedShape.fontSize);
  }

}

function mousePressed() {
  // verifica si la figura existe
  if (mouseX >= 0 && mouseX <= 0 + (canvasWidth) && mouseY >= 0 && mouseY <= 0 + (canvasHeight-105)) {
  for (let shape of shapes) {
    if (shapeContainsPoint(shape, mouseX, mouseY)) {
      selectedShape = shape;
      lastSelectedShape = selectedShape;

      if (selectedShape.type === "line") {
        selectedSegment = selectedShape;
      } else {
        selectedSegment = null;
      }
      return;
    }
  }
    
    // crea nuevas figuras
    const newShape = {
      id: nextShapeId++,
      type: currentShape,
      color: '#0F0F0F',
      x: mouseX,
      y: mouseY,
      width: 100,
      height: 100,
      strokeColor: '#DEDEDE',
      strokeWeight: 2,
      x1: mouseX,
      y1: mouseY,
      x2: mouseX + 100,
      y2: mouseY + 100,
      text: "texto",
      fontSize: 28
    };
    shapes.push(newShape);
    selectedShape = newShape;
    lastSelectedShape = newShape;
  }
}

function mouseDragged() {
  if (selectedShape && selectedShape.type === "line") {
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

    // ctrl
    if (isCtrlPressed) {
      selectedShape.x2 = mouseX;
      selectedShape.y2 = mouseY;
    } else {
      const dx = mouseX - selectedShape.x1;
      const dy = mouseY - selectedShape.y1;
      selectedShape.x1 += dx;
      selectedShape.y1 += dy;
      selectedShape.x2 += dx;
      selectedShape.y2 += dy;
    }
  } else if (selectedShape && selectedShape.type === "rectangle")  {
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
    
    // ctrl
    if (isCtrlPressed) {
      const dx = mouseX - selectedShape.x;
      const dy = mouseY - selectedShape.y;
      selectedShape.width = dx;
      selectedShape.height = dy;
    } else {
      selectedShape.x = mouseX;
      selectedShape.y = mouseY;
    }
  } else if (selectedShape && selectedShape.type === "ellipse")  {
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

    // ctrl
    if (isCtrlPressed) {
      const dx = mouseX - selectedShape.x;
      const dy = mouseY - selectedShape.y;
      selectedShape.width = dx;
      selectedShape.height = dy;
    } else {
      selectedShape.x = mouseX;
      selectedShape.y = mouseY;
    }
  } else if (selectedShape && selectedShape.type === "text")  {
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

    selectedShape.x = mouseX;
    selectedShape.y = mouseY;
  }
}

function mouseReleased() {
  selectedShape = null;
}

function keyPressed() {
  if (keyCode === DELETE && selectedShape) {
    const index = shapes.findIndex(shape => shape === selectedShape);
    shapes.splice(index, 1);
    selectedShape = null;
  }
}

// movimiento de las figuras
function shapeContainsPoint(shape, x, y) {
  if (shape.type === 'ellipse') {
    return dist(x, y, shape.x, shape.y) <= shape.width / 2;
  } else if (shape.type === 'rectangle') {
    return (
      x >= shape.x &&
      x <= shape.x + shape.width &&
      y >= shape.y &&
      y <= shape.y + shape.height
    );
  } else if (shape.type === 'line') {
    const d1 = dist(x, y, shape.x1, shape.y1);
    const d2 = dist(x, y, shape.x2, shape.y2);
    const lineLength = dist(shape.x1, shape.y1, shape.x2, shape.y2);
    const buffer = 0.5;
    return d1 + d2 >= lineLength - buffer && d1 + d2 <= lineLength + buffer;
  } else if (shape.type === 'text') {
    return (
      x >= shape.x &&
      x <= shape.x + textWidth(shape.text) &&
      y >= shape.y - textAscent() &&
      y <= shape.y + textDescent()
    );
  }
  return false;
}

// tipo actual
function setShapeType(shapeType) {
  currentShape = shapeType;
}

// updates de valores
function updateShapeColor() {
  if (lastSelectedShape) {
    const colorValue = document.getElementById("shape-color").value;
    lastSelectedShape.color = color(colorValue);
  }
}

function updateShapeOpacity() {
  if (lastSelectedShape) {
    const opacityValue = document.getElementById("shape-opacity").value;
    lastSelectedShape.color.setAlpha(opacityValue);
  }
}

function updateShapeStrokeColor() {
  if (lastSelectedShape) {
    const strokeColorValue = document.getElementById("shape-stroke-color").value;
    lastSelectedShape.strokeColor = color(strokeColorValue);
  }
}
function updateShapeStrokeOpacity() {
  if (lastSelectedShape) {
    const strokeOpacityValue = document.getElementById("shape-stroke-opacity").value;
    lastSelectedShape.strokeColor.setAlpha(strokeOpacityValue);
  }
}

function updateShapeStrokeWeight() {
  if (lastSelectedShape) {
    const strokeWeightValue = document.getElementById("shape-stroke-weight").value;
    lastSelectedShape.strokeWeight = parseInt(strokeWeightValue);
  }
}

function updateShapeCoordinates() {
  if (lastSelectedShape) {
    const xValue = document.getElementById("shape-x").value;
    const yValue = document.getElementById("shape-y").value;

    // Actualiza las coordenadas de la forma sin limitaciones
    lastSelectedShape.x = parseInt(xValue);
    lastSelectedShape.y = parseInt(yValue);
  }
}
function updateShapeSize() {
  if (lastSelectedShape) {
    const ancho = document.getElementById("ancho").value;
    const alto = document.getElementById("alto").value;

    lastSelectedShape.width = parseInt(ancho);
    lastSelectedShape.height = parseInt(alto);
  }
}

function updateShapeText() {
  const textValue = document.getElementById("texto").value;

  if (lastSelectedShape) {
    lastSelectedShape.text = textValue;
  }
}

function updateFiguraTamano() {
  if (lastSelectedShape) {
    const fontSize = document.getElementById("fontSize").value;

    lastSelectedShape.fontSize = parseInt(fontSize);
    lastSelectedShape.fontSize = parseInt(fontSize);
  }
}

function updateShapeLines() {
  const x1Value = document.getElementById("x1").value;
  const y1Value = document.getElementById("y1").value;
  const x2Value = document.getElementById("x2").value;
  const y2Value = document.getElementById("y2").value;

  if (lastSelectedShape) {
    lastSelectedShape.x1 = parseInt(x1Value);
    lastSelectedShape.y1 = parseInt(y1Value);
    lastSelectedShape.x2 = parseInt(x2Value);
    lastSelectedShape.y2 = parseInt(y2Value);
  }
}

// borrar
function borrar() {
  if (lastSelectedShape) {
    const index = shapes.findIndex(shape => shape === lastSelectedShape);
    shapes.splice(index, 1);
    lastSelectedShape = null;
  }
}

// ctrl
function handleKeyDown(event) {
  if (event.key === "Control") {
    isCtrlPressed = true;
  }
}

function handleKeyUp(event) {
  if (event.key === "Control") {
    isCtrlPressed = false;
  }
}