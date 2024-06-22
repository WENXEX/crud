<?php
//require("conexion.php");

/* Conectar a la base de datos
$servername = "localhost";
$username = "tu_usuario_de_bd";
$password = "tu_contraseña_de_bd";
$dbname = "personas";
$conn = new mysqli($localhost, $username, $password, $usuarios);
// Verificar la conexión

if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
*/

// Obtener datos del formulario
/*$usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];

// Consulta SQL para verificar el inicio de sesión
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";

$result = $conexion->query($sql);

if ($result->rowCount() == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($contraseña, $row['contraseña'])) {
        // Inicio de sesión exitoso, puedes establecer una sesión aquí
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: iniciodesesion.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conexion->close();*/




    session_start();
    if($_POST){
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contrasena'];

        try{
            require("conexion.php");
            $statement=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=:mat AND contraseña=:contra");

            $statement->execute(['mat'=>$usuario, 'contra'=>$contraseña]);

            $users=$statement->fetch();
            echo"".$users;
            if(!$users){
                echo"Login invalido"."<br>";
                echo"<a href='Login.html'>";
            }
            else{
                $_SESSION['usuario']=$users["usuario"];
                $_SESSION['contraseña']=$users["contraseña"];

                header("Location: consultas.php");
            }
        }
        catch(PDOException $e){
            echo"Error...gatos".$e->getMessage();
            die();
        }
    }
    else{
        header("Location: Login.html");
    }

?>