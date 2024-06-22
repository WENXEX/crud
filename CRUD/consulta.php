<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Noto+Sans+JP:wght@300&family=Playfair+Display&family=Quicksand:wght@300&family=Red+Hat+Display:wght@900&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesphp.css" />
    <title>Datos consultados</title>
</head>
<body>
    <h1>Datos:</h1>
    <div>
        <?php
        if($query->rowCount() > 0) {
            // Usaremos el ciclo para mostrar resultados
            
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Apellido</th>';
                echo '<th>fechadenacimiento</th>';
                echo '<th>Correo</th>';
                echo '<th>usuario</th>';
                echo '<th>contraseña</th>';
                echo '</tr>';
            echo '</thead>';
            echo "<tbody>";
            foreach($results as $result) {
                echo "<tr>"; 
                echo "<td>".$result['id_usuario']."</td>";
                echo "<td>".$result['Nombre']."</td>";
                echo "<td>".$result['Apellido']."</td>";
                echo "<td>".$result['fechadenacimiento']."</td>";
                echo "<td>".$result['correo']."</td>";
                echo "<td>".$result['usuario']."</td>";
                echo "<td>".$result['contra']."</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo '</table>';
            }else{
                echo "...";
            }
      
        ?>
    </div>
    <br>
    <a class="regis" href="index.html">Regresar</a>
</body>
</html>
