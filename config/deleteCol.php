<?php
    include("conexion.php");

    $cod = $_GET['id'];

    $sql = "DELETE FROM colaboradores WHERE id= '$cod'";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header("location: ../index.php");
        
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
?>