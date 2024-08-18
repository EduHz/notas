<?php
require 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $notas = $_POST['notas'];
    $autor = $_POST['autor'];

    $sql = "UPDATE notas SET titulo='$titulo', notas='$notas', autor='$autor' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        // echo "nota actualizada <br>";
        // echo "<a href='notas.php'>Ver todas las notas</a>";
        $sql = "SELECT * from notas where id = $id";
        echo "<h1>Nota actualizada</h1>";
        echo "<div class='contenedor'>";
        echo "<div class='nota'>";
        echo "<div class='fila1'>";
        echo "<h2>Titulo</h2>";
        echo "<h3>Notas</h3>";
        echo "<p>Autor</p>";
        echo "</div>";
        echo "<div class='datos'>";
        echo "<h2> $titulo </h2>";
        echo "<p> $notas </p>";
        echo "<p> $autor </p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<p>todas las notas<p/>";
        require 'notas.php';
        // header('Location: notas.php');
    } else {
        echo "error" . $conn->error;
    }
    $conn->close();
    exit();
}


?>

<style>
    .nota {
        display: grid;
    }

    .fila1 {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        background-color: rgb(203, 151, 151);
    }

    .datos {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        background-color: rgb(199, 181, 181);
        ;
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