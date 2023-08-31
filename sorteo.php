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
                        <option value="1">INGENIERIA AGRONOMICA</option>
                        <option value="2">INGENIERIA AGROINDUSTRIAL</option>
                        <option value="3">INGENIERIA TOPOGRAFICA Y AGRIMENSURA</option>
                        <option value="4">MEDICINA VETERINARIA Y ZOOTECNIA</option>
                        <option value="5">INGENIERIA ECONOMICA</option>
                        <option value="6">CIENCIAS CONTABLES</option>
                        <option value="7">ADMINISTRACION</option>
                        <option value="8">TRABAJO SOCIAL</option>
                        <option value="9">ENFERMERIA</option>
                        <option value="10">INGENIERIA DE MINAS</option>
                        <option value="11">HUMANIDADES</option>
                        <option value="12">SOCIOLOGIA</option>
                        <option value="13">TURISMO</option>
                        <option value="14">ANTROPOLOGIA</option>
                        <option value="15">CIENCIAS DE LA COMUNICACION SOCIAL</option>
                        <option value="16">ARTE: ARTES PLASTICAS</option>
                        <option value="17">ARTE: DANZA</option>
                        <option value="18">ARTE: MUSICA</option>
                        <option value="19">ARTE: TEATRO</option>
                        <option value="20">BIOLOGIA: ECOLOGIA </option>
                        <option value="21">BIOLOGIA: MICROBIOLOGIA Y LABORATORIO CLINICO</option>
                        <option value="22">BIOLOGIA: PESQUERIA </option>
                        <option value="23">EDUC. SEC.: CIENCIA, TECNOLOGIA Y AMBIENTE </option>
                        <option value="24">EDUC. SEC.: CIENCIAS SOCIALES</option>
                        <option value="25">EDUC. SEC.: LIT. PSICOLOGIA Y FILOSOFIA</option>
                        <option value="26">EDUC. SEC.: MATEMATICA, FISICA, COMP. E INFORMATICA</option>
                        <option value="27">EDUCACION PRIMARIA</option>
                        <option value="28">EDUCACION INICIAL</option>
                        <option value="29">EDUCACION FISICA</option>
                        <option value="30">INGENIERIA ESTADISTICA E INFORMATICA</option>
                        <option value="31">DERECHO</option>
                        <option value="32">INGENIERIA QUIMICA</option>
                        <option value="33">ODONTOLOGIA</option>
                        <option value="34">NUTRICION HUMANA</option>
                        <option value="35">INGENIERIA GEOLOGICA</option>
                        <option value="36">INGENIERIA METALURGICA</option>
                        <option value="37">INGENIERIA CIVIL</option>
                        <option value="38">ARQUITECTURA Y URBANISMO</option>
                        <option value="39">CIENCIAS FISICO MATEMATICAS: FISICA</option>
                        <option value="40">CIENCIAS FISICO MATEMATICAS: MATEMATICAS</option>
                        <option value="41">INGENIERIA AGRICOLA</option>
                        <option value="42">MEDICINA HUMANA</option>
                        <option value="43">INGENIERIA MECANICA ELECTRICA</option>
                        <option value="44">INGENIERIA ELECTRONICA</option>
                        <option value="45">INGENIERIA DE SISTEMAS</option>
    </select>
    <input type="submit" name="filtrar" value="filtrar">
</form>

<form action="" method="post">
    <input type="submit" name="sortear" value="Sortear de Nuevo">
</form>

<table border="1">
    <tr>
        <th>ID </th>
        <th>DNI </th>
        <th>NOMBRES </th>
        <th>APELLIDOS </th>
        <!-- Agrega más columnas según tu esquema de base de datos -->
    </tr>

    <?php




if(isset($_POST['filtrar'])  ) {
    $filtro_programa = $_POST['programa'];
    $sql = "SELECT * FROM  alumnos a 
    INNER JOIN  asistencia  asis  ON  a.dni = asis.dni
    INNER JOIN program p ON a.programa_id = p.prog_id  WHERE a.programa_id = '$filtro_programa'";

} elseif(isset($_POST['sortear']) &&isset($_POST['filtrar'])) {
    $filtro_programa = $_POST['programa'];
    $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni  WHERE a.programa_id = '$filtro_programa' ORDER BY RAND() LIMIT 10";


    
} else {
    $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni ";
}

    // if(isset($_POST['filtrar'])) {
    //     $filtro_programa = $_POST['programa'];
    //     $sql = "SELECT * FROM  alumnos a 
    //     INNER JOIN  asistencia  asis  ON  a.dni = asis.dni
    //     INNER JOIN program p ON a.programa_id = p.prog_id  WHERE a.programa_id = '$filtro_programa'";

    // } elseif(isset($_POST['sortear']) && ($_POST['filtrar'])) {
    //     $filtro_programa = $_POST['programa'];
    //     $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni  WHERE programa_id = '$filtro_programa' ORDER BY RAND() LIMIT 10";
    // } else {
    //     $sql = "SELECT * FROM asistencia  asis INNER JOIN alumnos a ON asis.dni = a.dni ";
    // }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td> # </td>";
            echo "<td>" . $row["dni"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            // echo "<td>" . $row["programa"] . "</td>";

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
