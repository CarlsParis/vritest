<?php 

    $hostname = "localhost";
    $database = "ingresantes";
    $user = "root";
    $password = "";


    $conn = mysqli_connect($hostname, $user, $password, $database);


    if(!$conn){
        die( "Conection Failed". mysqli_connect_error());
    }

    // echo "Conectado !";

    // mysqli_close($conn);

?>