<?php
require("conexion.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Evitar la inyección SQL
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $id, PDO::PARAM_INT);

    if ($query->execute()) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $query->errorInfo()[2];
    }
    header("Location: consultas.php");
} else {
    echo "ID no válida o no especificada.";
}
?>