<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nota_db";

// Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    // Comando die corta la reproduccion del codigo
    die("Conexion Fallida: " . $conn->connect_error);
}

// echo "Conexion Exitosa";
