(inicio_exitoso.php)
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    echo "¡Inicio de sesión exitoso!";
    // Aquí puedes mostrar el contenido protegido.
} else {
    header("Location: login.html");
}
?>