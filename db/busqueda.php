<?php include("conection.php") ?>

<?php

if (isset($_GET["query"])) {
    $dnibusqueda = $_GET["query"];
    $estado  = '1';

    // Realizar la consulta en la base de datos
    $sql = "SELECT * FROM alumnos WHERE dni LIKE '%$dnibusqueda%'";
    $result = mysqli_query($conn, $sql);

    // Mostrar los resultados
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row["dni"] . "</p>";
            echo "<p>" . $row["paterno"] . "</p>";
            echo "<p>" . $row["materno"] . "</p>";
            echo "<p>" . $row["nombres"] . "</p>";
            echo "<p>" . $row["programa"] . "</p>"; 
        }

                 $query=mysqli_query($conn,"SELECT * FROM asistencia WHERE dni = '$dnibusqueda' ")or die(mysqli_error($con));
                 $count=mysqli_num_rows($query);		
                        if ($count>0)
                        { ?>
                            <!-- echo "<script type='text/javascript'>alert('Estudiante ya registrado');</script>";	
                            echo "<script>document.location='../index.php'</script>";   -->
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <style>
                                    .alert {
                                        background-color: yellow;
                                        color: white;
                                        padding: 10px;
                                        position: fixed;
                                        top: 0;
                                        left: 50%;
                                        transform: translateX(-50%);
                                        opacity: 1;
                                        transition: opacity 0.5s ease-in-out;
                                    }
                                    .hidden {
                                        opacity: 0;
                                    }
                                </style>
                            </head>
                            <body>
                                <div id="alertBox" class="alert">Estudiante ya registrado</div>

                                <script type="text/javascript">
                                    setTimeout(function() {
                                        var alertBox = document.getElementById('alertBox');
                                        alertBox.classList.add('hidden');
                                    }, 3000); // 3000 milliseconds = 3 seconds
                                </script>
                            </body>
                            </html>
                        <?php } 
        else{
        {
        mysqli_query($conn,"INSERT INTO asistencia(dni,estado)
            VALUES('$dnibusqueda','$estado')")or die(mysqli_error($conn));
        }			
            // echo "<script type='text/javascript'>alert('Asistencia agregado');</script>";	
            // echo "<script>document.location='../index.php'</script>";  
            ?>
            <!-- echo "<script type='text/javascript'>alert('Estudiante ya registrado');</script>";	
            echo "<script>document.location='../index.php'</script>";   -->
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    .alert {
                        background-color: green;
                        color: white;
                        padding: 10px;
                        position: fixed;
                        top: 0;
                        left: 50%;
                        transform: translateX(-50%);
                        opacity: 1;
                        transition: opacity 0.5s ease-in-out;
                    }
                    .hidden {
                        opacity: 0;
                    }
                </style>
            </head>
            <body>
                <div id="alertBox" class="alert">ASISTENCIAS REGISTRADO</div>

                <script type="text/javascript">
                    setTimeout(function() {
                        var alertBox = document.getElementById('alertBox');
                        alertBox.classList.add('hidden');
                    }, 3000); // 3000 milliseconds = 3 seconds
                </script>
            </body>
            </html>
        <?php 
            

        }   
            

        header("Refresh: 1.5; URL=../index.php");

        // echo "<script type='text/javascript'>
        
        // alert('Miembro nuevo con éxito agregado');</script>";	

        // echo "<script>document.location='../index.php'</script>";

    } else {

        ?>
        <!-- echo "<script type='text/javascript'>alert('Estudiante ya registrado');</script>";	
        echo "<script>document.location='../index.php'</script>";   -->
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                .alert {
                    background-color: RED;
                    color: white;
                    padding: 10px;
                    position: fixed;
                    top: 0;
                    left: 50%;
                    transform: translateX(-50%);
                    opacity: 1;
                    transition: opacity 0.5s ease-in-out;
                }
                .hidden {
                    opacity: 0;
                }
            </style>
        </head>
        <body>
            <div id="alertBox" class="alert">NO ERES CACHIMBO</div>

            <script type="text/javascript">
                setTimeout(function() {
                    var alertBox = document.getElementById('alertBox');
                    alertBox.classList.add('hidden');
                }, 3000); // 3000 milliseconds = 3 seconds
            </script>
        </body>
        </html>
    <?php 
        // echo "No se encontraron resultados.";

        
            // header("Refresh: 1; URL=../index.php");
            
    header("Refresh: 1.5; URL=../index.php");
            
    }
} else {
    echo "Ingrese un término de búsqueda.";
}

?>