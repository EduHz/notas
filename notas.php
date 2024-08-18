<!-- <a href="index.php" class="btn crear-nota">Crear Nueva Nota</a> -->

<?php
require "conexion.php";

// Consulta para crear notas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $notas = $_POST['notas'];
    $autor = $_POST['autor'];

    // Aquí va el nombre de la tabla
    $sql = "INSERT INTO notas (titulo, notas, autor) VALUES ('$titulo','$notas','$autor')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Consulta para obtener todas las notas
$sql = "SELECT * from notas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='contenedor'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='nota-card'>";
        echo "<div class='nota-header'>";
        echo "<h3>" . $row['titulo'] . "</h3>";
        echo "</div>";
        echo "<div class='nota-body'>";
        echo "<p class='nota-text'>" . $row['notas'] . "</p>";
        echo "</div>";
        echo "<div class='nota-footer'>";
        echo "<p>Autor: " . $row['autor'] . "</p>";
        echo "<p class='fecha'>" . $row['fecha_hora'] . "</p>";
        echo "</div>";
        echo "<div class='nota-actions'>";
        echo "<a href='editar.php?id=" . $row['id'] . "' class='btn'>Editar</a>";
        echo "<a onclick='return confirm(\"¿Deseas eliminar esta nota?\")' href='eliminar.php?id=" . $row['id'] . "' class='btn eliminar'>Eliminar</a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<div class='no-notas'>No hay notas disponibles</div>";
}
$conn->close();
?>

<style>
    /* .crear-nota {
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 1em;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
} */

.crear-nota:hover {
    background-color: #3e8e41;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.contenedor {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto;
}

.nota-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s ease;
}

.nota-card:hover {
    transform: translateY(-5px);
}

.nota-header h3 {
    margin: 0 0 10px;
    font-size: 1.25em;
    color: #333;
}

.nota-body {
    flex-grow: 1;
    max-height: 150px; /* Limitar la altura de la nota */
    overflow: hidden; /* Esconder el texto que se sale de la card */
    position: relative;
}

.nota-text {
    color: #555;
    line-height: 1.5;
    margin: 0 0 10px;
}

.nota-body::after {
    content: '...'; /* Indicar que el texto está truncado */
    position: absolute;
    bottom: 0;
    right: 0;
    background: linear-gradient(to bottom, transparent, #fff);
    padding-right: 5px;
}

.nota-footer {
    display: flex;
    justify-content: space-between;
    font-size: 0.875em;
    color: #777;
}

.nota-actions {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}

.btn.eliminar {
    background-color: #dc3545;
}

.btn.eliminar:hover {
    background-color: #c82333;
}

.no-notas {
    font-size: 1.25em;
    color: #777;
    text-align: center;
}

@media (max-width: 768px) {
    .nota-card {
        max-width: 100%;
    }
    .contenedor {
        display: grid;
        justify-content: center;
        align-items: center;
        grid-template-columns: 1fr;
        font-size: 5vh;
        padding: 3%;
        gap: 3%;
        padding-right: 7%;
        /* padding: 3%; */
    }
}
</style>
