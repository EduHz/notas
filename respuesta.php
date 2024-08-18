<?php
require 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $notas = $_POST['notas'];
    $autor = $_POST['autor'];

    $sql = "UPDATE notas SET titulo='$titulo', notas='$notas', autor='$autor' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        $sql = "SELECT * from notas where id = $id";
        echo "<h1>Nota actualizada</h1>";
        header('Location: notas.php');
    } else {
        echo "error" . $conn->error;
    }
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