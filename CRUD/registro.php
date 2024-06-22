<link rel="stylesheet" href="estilos.css" />
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recupera los datos del formulario
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $fechaNacimiento = $_POST["fechaNacimiento"];
                $correo = $_POST["correo"];
                $usuario = $_POST["usuario"];
                $contrasena = $_POST["contrasena"];

                // Imprime los datos en la página
                echo "<p><strong>Nombres:</strong> $nombres</p>";
                echo "<p><strong>Apellidos:</strong> $apellidos</p>";
                echo "<p><strong>Fecha de Nacimiento:</strong> $fechaNacimiento</p>";
                echo "<p><strong>Correo:</strong> $correo</p>";
                echo "<p><strong>usuario:</strong> $usuario</p>";
                echo "<p><strong>Contraseña:</strong> $contrasena</p>";
            }
            $conexion = new mysqli("localhost", "root", "", "personas");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, fechadenacimiento, correo, usuario, contraseña) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssss", $nombres, $apellidos, $fechaNacimiento, $correo, $usuario, $contrasena);
            $stmt->execute();
            echo "<h2>¡¡¡Registro Exitoso!!!</h2>";
            $stmt->close();
            $conexion->close();
            ?>