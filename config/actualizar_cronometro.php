<?php
    include("conexion.php");
    $indent = $_POST['indent'];
    $tiempo_trabajado = $_POST['tiempo_trabajado'];

    // Obtener la fecha y hora actual menos el tiempo trabajado
    $inicio = date('Y-m-d H:i:s', strtotime('-' . $tiempo_trabajado . ' seconds'));

    // Actualizar el registro en la tabla cronometros
    $sql_update = "UPDATE cronometros SET inicio='$inicio' WHERE indent='$id_colaborador'";
    $query_update = mysqli_query($conexion, $sql_update);

    if ($query_update) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
?>
