<?php
   include("conexion.php");
   $cod = $_POST['id'];
   $ident_col = $_POST['ident'];
   $name = $_POST['name'];
   $ape = $_POST['ape'];
   $cargo = $_POST['cargo'];

   $sql = "UPDATE colaboradores SET indent='$ident_col', nombreCol='$name',  apellidoCol='$ape', cargoCol='$cargo' WHERE id= '$cod'";
   $query = mysqli_query($conexion, $sql);

   if ($query) {
       header("location: ../index.php");   
   } 
   // Cerrar la conexión
   mysqli_close($conexion);
?>

