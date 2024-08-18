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
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos globales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Open Sans, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilos del formulario */
        form {
            display: grid;
            gap: 15px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            font-size: 1rem;
        }

        input[type="text"], input[type="submit"], input[type="hidden"] {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #23527c;
        }

        /* Estilo para el mensaje "Nota no encontrada" */
        .no-notas {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos responsivos */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            form {
                padding: 15px;
            }

            label, input[type="text"], input[type="submit"] {
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>
