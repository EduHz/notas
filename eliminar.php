<?php
    require 'conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "DELETE from notas where id = $id";
        if ($conn->query($sql) == TRUE) {
            // echo "nota eliminada <br>";
            // echo "<a href='notas.php'>Ver todas las notas</a>";
            header('Location: notas.php');
        } else {
            echo "error" . $conn->error;
        }
    }


