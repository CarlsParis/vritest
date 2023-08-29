<?php include("conection.php") ?>

<?php

if (isset($_GET["query"])) {
    $query = $_GET["query"];

    // Realizar la consulta en la base de datos
    $sql = "SELECT * FROM alumnos WHERE dni LIKE '%$query%'";
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

        
        header("Refresh: 1.5; URL=../index.php");

        // echo "<script type='text/javascript'>
        
        // alert('Miembro nuevo con éxito agregado');</script>";	

        // echo "<script>document.location='../index.php'</script>";

    } else {
        echo "No se encontraron resultados.";


    


        
            header("Refresh: 1; URL=../index.php");
            

    }
} else {
    echo "Ingrese un término de búsqueda.";
}

?>