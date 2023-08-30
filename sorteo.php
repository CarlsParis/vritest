<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Filtro y Sorteo de Registros</title>
</head>
<body>

<h1>Sorteo</h1>

<form action="" method="post">
    <label for="programa">Programa:</label>
    <select name="programa" id="programa">

        <option value="1">Estado 1</option>
        <option value="0">Estado 2</option>


    </select>
    <input type="submit" name="filtrar" value="Filtrar">
</form>

<form action="" method="post">
    <input type="submit" name="sortear" value="Sortear de Nuevo">
</form>

<table border="1">
    <tr>
        <th>ID </th>
        <th>DNI</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <!-- Agrega más columnas según tu esquema de base de datos -->
    </tr>

    <?php



    if(isset($_POST['filtrar'])) {
        $filtro_estado = $_POST['estado'];
        $sql = "SELECT * FROM asistencia  asis
        INNER JOIN alumnos a ON asis.dni = a.dni  WHERE estado = '$filtro_estado'";
    } elseif(isset($_POST['sortear']) && isset($_POST['filtrar'])) {
        $filtro_estado = $_POST['estado'];
        $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni  WHERE estado = '$filtro_estado' ORDER BY RAND() LIMIT 10";
    } else {
        $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni ";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td> # </td>";
            // echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["dni"] . "</td>";
            // echo "<td>" . $row["nombre"] . "</td>";
            // Agrega más columnas según tu esquema de base de datos
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>



<div class="form-group">
                <label for="date">SELECIONE PROG. DE ESTUDIO:</label>
                <!-- <input type="text" name="usuario"> -->
                <select class="form-control select2" name="usuario" required>
                    <tr>
                        <option value="INGENIERIA AGRONOMICA">INGENIERIA AGRONOMICA</option>
                        <option value="INGENIERIA AGROINDUSTRIAL">INGENIERIA AGROINDUSTRIAL</option>
                        <option value="INGENIERIA TOPOGRAFICA Y AGRIMENSURA">INGENIERIA TOPOGRAFICA Y AGRIMENSURA</option>
                        <option value="MEDICINA VETERINARIA Y ZOOTECNIA">MEDICINA VETERINARIA Y ZOOTECNIA</option>
                        <option value="INGENIERIA ECONOMICA">INGENIERIA ECONOMICA</option>
                        <option value="CIENCIAS CONTABLES">CIENCIAS CONTABLES</option>
                        <option value="ADMINISTRACION">ADMINISTRACION</option>
                        <option value="TRABAJO SOCIAL">TRABAJO SOCIAL</option>
                        <option value="ENFERMERIA">ENFERMERIA</option>
                        <option value="INGENIERIA DE MINAS">INGENIERIA DE MINAS</option>
                        <option value="HUMANIDADES">HUMANIDADES</option>
                        <option value="SOCIOLOGIA">SOCIOLOGIA</option>
                        <option value="TURISMO">TURISMO</option>
                        <option value="ANTROPOLOGIA">ANTROPOLOGIA</option>
                        <option value="CIENCIAS DE LA COMUNICACION SOCIAL">CIENCIAS DE LA COMUNICACION SOCIAL</option>
                        <option value="ARTE: ARTES PLASTICAS">ARTE: ARTES PLASTICAS</option>
                        <option value="ARTE: DANZA">ARTE: DANZA</option>
                        <option value="ARTE: MUSICA">ARTE: MUSICA</option>
                        <option value="ARTE: TEATRO">ARTE: TEATRO</option>
                        <option value="BIOLOGIA: ECOLOGIA ">BIOLOGIA: ECOLOGIA </option>
                        <option value="BIOLOGIA: MICROBIOLOGIA Y LABORATORIO CLINICO">BIOLOGIA: MICROBIOLOGIA Y LABORATORIO CLINICO</option>
                        <option value="BIOLOGIA: PESQUERIA ">BIOLOGIA: PESQUERIA </option>
                        <option value="EDUC. SEC.: CIENCIA, TECNOLOGIA Y AMBIENTE ">EDUC. SEC.: CIENCIA, TECNOLOGIA Y AMBIENTE </option>
                        <option value="EDUC. SEC.: CIENCIAS SOCIALES">EDUC. SEC.: CIENCIAS SOCIALES</option>
                        <option value="EDUC. SEC.: LIT. PSICOLOGIA Y FILOSOFIA">EDUC. SEC.: LIT. PSICOLOGIA Y FILOSOFIA</option>
                        <option value="EDUC. SEC.: MATEMATICA, FISICA, COMP. E INFORMATICA">EDUC. SEC.: MATEMATICA, FISICA, COMP. E INFORMATICA</option>
                        <option value="EDUCACION PRIMARIA">EDUCACION PRIMARIA</option>
                        <option value="EDUCACION INICIAL">EDUCACION INICIAL</option>
                        <option value="EDUCACION FISICA">EDUCACION FISICA</option>
                        <option value="INGENIERIA ESTADISTICA E INFORMATICA">INGENIERIA ESTADISTICA E INFORMATICA</option>
                        <option value="DERECHO">DERECHO</option>
                        <option value="INGENIERIA QUIMICA">INGENIERIA QUIMICA</option>
                        <option value="ODONTOLOGIA">ODONTOLOGIA</option>
                        <option value="NUTRICION HUMANA">NUTRICION HUMANA</option>
                        <option value="INGENIERIA GEOLOGICA">INGENIERIA GEOLOGICA</option>
                        <option value="INGENIERIA METALURGICA">INGENIERIA METALURGICA</option>
                        <option value="INGENIERIA CIVIL">INGENIERIA CIVIL</option>
                        <option value="ARQUITECTURA Y URBANISMO">ARQUITECTURA Y URBANISMO</option>
                        <option value="CIENCIAS FISICO MATEMATICAS: FISICA">CIENCIAS FISICO MATEMATICAS: FISICA</option>
                        <option value="CIENCIAS FISICO MATEMATICAS: MATEMATICAS">CIENCIAS FISICO MATEMATICAS: MATEMATICAS</option>
                        <option value="INGENIERIA AGRICOLA">INGENIERIA AGRICOLA</option>
                        <option value="MEDICINA HUMANA">MEDICINA HUMANA</option>
                        <option value="INGENIERIA MECANICA ELECTRICA">INGENIERIA MECANICA ELECTRICA</option>
                        <option value="INGENIERIA ELECTRONICA">INGENIERIA ELECTRONICA</option>
                        <option value="INGENIERIA DE SISTEMAS">INGENIERIA DE SISTEMAS</option>
                </select>
            </div><!-- /.form group -->