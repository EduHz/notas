<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $sql = "SELECT * FROM notas WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $notas = $row['notas'];
        $autor = $row['autor'];
    } else {
        echo "<div class='no-notas'>Nota no encontrada</div>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-top: 0;
            color: #333;
            font-size: 1.75em;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        input[type="text"] {
            background-color: #f9f9f9;
            color: #333;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .no-notas {
            font-size: 1.25em;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Nota</h2>

        <form action="respuesta.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label for="Titulo">Titulo</label>
            <input type="text" name="titulo" maxlength="20" value="<?php echo $titulo;?>" required>

            <label for="Nota">Nota</label>
            <input type="text" name="notas" value="<?php echo $notas;?>" required>

            <label for="Autor">Autor</label>
            <input type="text" name="autor" maxlength="20" value="<?php echo $autor;?>" required>

            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
