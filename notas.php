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
        echo "<h2>Titulo</h2>";
        echo "<h3>Notas</h3>";
        echo "<p>Autor</p>";
        echo "<p>Fecha</p>";
        echo "</div>";
        echo "<div class='datos'>";
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>" . $row['notas'] . "</p>";
        echo "<p>" . $row['autor'] . "</p>";
        echo "<p>" . $row['fecha_hora'] . "<p/>";
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
    .nota {
            display: grid;
    }
    .fila1 {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr 1fr;
        background-color: rgb(203, 151, 151);
    }
    .datos {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr 1fr;
        background-color: rgb(199, 181, 181);;
    }
    .datos p {
        display: flex;
        padding: 5%;
        
    }
    .contenedor {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5%;
    }
</style>