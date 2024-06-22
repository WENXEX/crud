<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: Login.html');
}
else{
    $usuarioActivo = $_SESSION['usuario'];
    $id=$_SESSION['contraseña'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta</title>
    <link rel="stylesheet" href="skin_consulta.css">
</head>
<body>
<?php
require("conexion.php");
$sql = "SELECT * FROM usuarios";
$query = $conexion -> prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
if($query->rowCount()>0){
    //Usaremos el ciclo para mostrar resultados
    echo"<h1>".'Bienvenid@: '.$usuarioActivo."</h1>"."</br></br>";
    echo"<a href ='cerrarSesion.php'> Cerrar Sesion </a></br>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>apellido</th><th>fecha de nacimiento</th><th>Email</th><th>Usuario</th><th>Contraseña</th></tr>";
    foreach($results as $result){
        echo "<tr>";
        echo "<td>".$result['nombre']."</td>";
        echo "<td>".$result['apellido']."</td>";
        echo "<td>".$result['fechadenacimiento']."</td>";
        echo "<td>".$result['correo']."</td>";
        echo "<td>".$result['usuario']."</td>";
        echo "<td>".$result['contraseña']."</td>";
        echo "<td>"."<a href='actualizar.php?id=$result[id]&?contra=$result[contraseña]'> <img src='img/actualizar.jpg' alt='Actualizar' width='70' height='50'></a></td>";
        echo "<td>"."<a href='eliminar.php?id=$result[id]&?contra=$result[contraseña]' ><img src='img/basurero.jpg' alt='eliminar' width='60' height='50'></a></td>";
        echo "</tr>";
    }
    echo"<table>";
}else{
    echo"....";
}
?>



</body>
<footer>

<button type="submit"><a href="Index.html">Inicio</a></button>
</footer>
</html>