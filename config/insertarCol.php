<?php
    include("conexion.php");

    $ident_col = $_POST['ident'];
    $name = $_POST['name'];
    $ape = $_POST['ape'];
    $cargo = $_POST['cargo'];

    // Consultar si ya existe un registro con la misma identidad o nombre
    $sql_check = "SELECT * FROM colaboradores WHERE indent='$ident_col' OR nombreCol='$name'";
    $query_check = mysqli_query($conexion, $sql_check);
    $num_rows = mysqli_num_rows($query_check);

    if ($num_rows > 0) {
        // Si ya existe un registro, mostrar un mensaje de error
        echo "Ya existe un colaborador con esa identidad o nombre";
    } else {
        // Si no existe un registro, insertar el nuevo colaborador
        $sql_insert_col = "INSERT INTO colaboradores (indent, nombreCol, apellidoCol, cargoCol) VALUES ('$ident_col', '$name', '$ape', '$cargo')";
        $query_insert_col = mysqli_query($conexion, $sql_insert_col);

        if ($query_insert_col) {
            // Insertar un nuevo registro en la tabla de cronómetros para el colaborador recién creado
            $last_inserted_id = mysqli_insert_id($conexion);
            $sql_insert_crono = "INSERT INTO cronometro (indent, usuario, estado, inicio, cronometro_id) VALUES ('$ident_col', '$name', 0, NULL, '$last_inserted_id')";
            $query_insert_crono = mysqli_query($conexion, $sql_insert_crono);

            if ($query_insert_crono) {
                header("location: ../index.php");
                echo "Usuario registrado exitosamente";
            } else {
                echo "Error al insertar el registro del cronómetro: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
?>
