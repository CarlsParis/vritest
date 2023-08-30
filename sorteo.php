<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sorteo de Registros</title>
</head>
<body>

<h1>Registros Sorteados</h1>

<form action="" method="post">
    <input type="submit" name="sortear" value="Sortear de Nuevo">
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <!-- Agrega más columnas según tu esquema de base de datos -->
    </tr>

    <?php


    if(isset($_POST['sortear'])) {
        // Consulta para obtener 10 registros aleatorios
        $sql = "SELECT * FROM asistencia ORDER BY RAND() LIMIT 10";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["dni"] . "</td>";
                // echo "<td>" . $row["nombres"] . "</td>";
                // Agrega más columnas según tu esquema de base de datos
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
        }
    }

    $conn->close();
    ?>
</table>

</body>
</html>