<link rel="stylesheet" href="estilos.css" />
<?php
require("conexion.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $query = $conexion->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=width=device-width, initial-scale=1.0>
    <title>Actualización</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Actualización de datos</h1>
    </header>
    <nav>
    <h2>Actualice sus datos</h2>
    </nav>
    <div class="container">
        <div class="form-container">
        <form method="POST" action="proceso_actualizar.php">
            <label for="id">Id:</label>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?= $result['nombre'] ?>"><br>
            <label for="apellido">apellido:</label>
            <input type="text" name="apellido" value="<?= $result['apellido'] ?>"><br>
            <label for="fechadenacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fechadenacimiento" value="<?= $result['fechadenacimiento'] ?>"><br>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" value="<?= $result['correo'] ?>"><br>
            <label for="usuario">usuario:</label>
            <input type="text" name="usuario" value="<?= $result['usuario'] ?>"><br>
            <label for="contrasena">contraseña:</label>
            <input type="text" name="contrasena" value="<?= $result['contraseña'] ?>"><br>
            <input type="submit" value="Actualizar">
        </form>
        </div>
    </div>
    <footer class="po">
        <br><p>&copy;papycris</p>
    </footer>
</body>
</html>
<?php
    } else {
        echo "El registro no se encontró.";
    }
} else {
    echo "ID no válido.";
}
?>

<?php

/*/if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $query = $conexion->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // El registro se encontró, ahora puedes mostrar el formulario de actualización.*/
?>