<?php
require "conexion.php";

// Consulta para crear notas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $notas = $_POST['notas'];
    $autor = $_POST['autor'];

    // Aqui va el nombre de tabla

    $sql = "INSERT INTO notas (titulo, notas, autor) VALUES ('$titulo','$notas','$autor')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $conn->close();
}

// Consulta para obtener todas las notas
$sql = "SELECT * from notas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='contenedor'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='nota'>";
        echo "<div class='fila1'>";
        echo "<p>Titulo</p>";
        echo "<p>Notas</p>";
        echo "<p>Autor</p>";
        echo "<p>Fecha</p>";
        echo "</div>";
        echo "<div class='datos'>";
        echo "<p>" . $row['titulo'] . "</p>";
        echo "<p>" . $row['notas'] . "</p>";
        echo "<p>" . $row['autor'] . "</p>";
        echo "<p class='fecha'>" . $row['fecha_hora'] . "<p/>";
        echo "</div>";
        echo "<a href='editar.php?id=" . $row['id'] . "'>Editar</a>";
        echo "<a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No hay notas disponibles";
}
$conn->close();

?>


<style>
   /* Estilo global */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Open Sans, sans-serif;
  background-color: #f9f9f9;
}

/* Contenedor de notas */
.contenedor {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  padding: 20px;
}

/* Nota individual */
.nota {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Encabezado de nota */
.fila1 {
  display: grid;
  grid-template-columns: 1fr 2fr 1fr 1fr;
  padding-bottom: 2%;
  border-bottom: 1px solid #ddd;
  font-weight: 600;
  font-size: 1rem;
}


/* Datos de nota */
.datos {
  display: grid;
  grid-template-columns: 1fr 2fr 1fr 1fr;
  padding-top: 10px;
  gap: 2%;
}

.datos p {
  margin-bottom: 10px;
}

/* Enlaces de acción */
.nota a {
  text-decoration: none;
  color: #337ab7;
  margin-right: 10px;
}

.nota a:hover {
  color: #23527c;
}

.titulo {
    font-size: 10px;
}


@media (width < 800px) {
    .contenedor {
        grid-template-columns: 1fr;
        font-size: 3rem;
    }
    .titulo {
        font-size: 1vh;
    }
    .fila1 {
        font-size: 3rem;
    }
    .fecha {
        font-size: 2rem;
    }
}

</style>