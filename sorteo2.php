<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>

<div class="container d-flex justify-conter-center align-items-center">
    <div class="container">
        <div class="container">
            <div class="container">

                <h4 class="text-center py-3">Sorteo proyeccion social</h4>

                <div class="container">


                    <form action="" method="post">
                        <input class="btn btn-warning" type="submit" name="sortear" value="Sortear de Nuevo">
                        <!-- <input class="btn btn-danger" type="submit" name="sortear" value="Sortear de Nuevo"> -->
                        </div>
                    </form>
                </div>


                <!-- <form action="" method="post">
                    <input type="submit" name="guardar" value="guardar ganadores">
                </form> -->


                <div class="container">


                    <table class="table table-striped" border="1">
                        <tr class="table-dark">
                            <!-- <th class="centered">ID </th> -->
                            <th class="centered">DNI </th>
                            <th class="centered">NOMBRES </th>
                            <th class="centered">APELLIDOS PATERNO </th>
                            <th class="centered">APELLIDOS MATERNO </th>
                            <th class="centered">PROGRAMA DE ESTUDIO </th>

                            <!-- Agrega más columnas según tu esquema de base de datos -->
                        </tr>

                        <?php

                        // $a= $_POST['filtrar'];
                        // $b = $_POST['programa'];

                        // $c = var_dump($_POST['programa']);

                        if (isset($_POST['filtrar'])) {
                            $filtro_programa = $_POST['programa'];


                            $sql = "SELECT * FROM alumnos a INNER JOIN asistencia asis ON a.dni = asis.dni 
                            inner join program p ON a.programa_id = p.prog_id ";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                 //   echo "<td> # </td>";
                                    //echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["dni"] . "</td>";
                                    echo "<td>" . $row["nombres"] . "</td>";
                                    echo "<td>" . $row["paterno"] . "</td>";
                                    echo "<td>" . $row["materno"] . "</td>";
                                    echo "<td>" . $row["programa"] . "</td>";
                                    // echo "<td>" . $row["programa"] . "</td>";

                                    // echo $a;
                                    // echo $b;
                                    // echo $c;

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
                            }
                        }




                        if (isset($_POST['sortear'])) {

                            $filtro_programa = $_POST['programa'];

                            $sql1 = "SELECT * FROM alumnos a INNER JOIN asistencia asis ON a.dni = asis.dni 
                            inner join program p ON a.programa_id = p.prog_id where  ORDER BY RAND() LIMIT 3";

                            $result = $conn->query($sql1);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                           
                                    echo "<td>" . $row["dni"] . "</td>";
                                    echo "<td>" . $row["nombres"] . "</td>";
                                    echo "<td>" . $row["paterno"] . "</td>";
                                    echo "<td>" . $row["materno"] . "</td>";
                                    echo "<td>" . $row["programa"] . "</td>";
              

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
                            }
                        }


                        //else {
                        //     $sql = "SELECT * FROM alumnos asis INNER JOIN alumnos a ON asis.dni = a.dni where  a.programa_id = '$filtro_programa' ";
                        // }
                        //     $result = $conn->query($sql);

                        //     if ($result->num_rows > 0) {
                        //         while ($row = $result->fetch_assoc()) {
                        //             echo "<tr>";
                        //             echo "<td> # </td>";
                        //             echo "<td>" . $row["dni"] . "</td>";
                        //             echo "<td>" . $row["nombres"] . "</td>";
                        //             // echo "<td>" . $row["programa"] . "</td>";

                        //             echo "</tr>";
                        //         }
                        //     } else {
                        //         echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
                        //     }

                        $conn->close();
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>