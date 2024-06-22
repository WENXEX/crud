<?php
require("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechadenacimiento = $_POST['fechadenacimiento'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contrasena'];


    $sql="UPDATE usuarios set nombre=:pnombre, apellido=:apellidoP, fechadenacimiento=:fechadenacimiento,correo=:pw,  usuario=:sexo, contraseña=:contrasena WHERE id=:id_entrada";

    $sql=$conexion->prepare($sql);
$sql->bindParam(":id_entrada",$id,PDO::PARAM_INT);
$sql->bindParam(":pnombre",$nombre,PDO::PARAM_STR);
$sql->bindParam(":pw",$correo,PDO::PARAM_STR);
$sql->bindParam(":apellidoP",$apellido,PDO::PARAM_STR);
$sql->bindParam(":fechadenacimiento",$fechadenacimiento,PDO::PARAM_STR);
$sql->bindParam(":sexo",$usuario,PDO::PARAM_STR);
$sql->bindParam(":contrasena",$contraseña,PDO::PARAM_STR);
$sql->execute();
echo "Los datos se actualizaron correctamente.";

/*
    $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, fechadenacimiento = ?, correo = ?, usuario = ?, contraseña = ?, = ? WHERE id = ?";
    $query = $conexion->prepare($sql);
    if ($query->execute([$nombre, $apellido, $fechadenacimiento, $correo, $usuario, $contraseña, $id])) {
        echo "Los datos se actualizaron correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $query->errorInfo()[2];
    }
    header("Location: consultas.php");

} else {
    echo "Solicitud no válida.";
}
*/
} else {
    echo "Solicitud no válida.";
}
?>