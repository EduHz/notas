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
        echo "nota no encontrada";
        exit();
    }
}

?>

<h2>Editar Nota</h2>
<!-- Cambiar action -->
<form action="respuesta.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <label for="Titulo">Titulo</label>
    <input type="text" name="titulo" maxlength="20" value="<?php echo $titulo;?>">
    <label for="Nota">Nota</label>
    <input type="text" name="notas" value="<?php echo $notas;?>">
    <label for="Autor">Autor</label>
    <input type="text" name="autor" maxlength="20" value="<?php echo $autor;?>">
    <input type="submit">
</form>


