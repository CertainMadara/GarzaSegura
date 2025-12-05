<?php
include("conexion.php");

$id= $_POST['id'];
$Matricula= $_POST['matricula'];
$Correo= $_POST['correo'];
$Contraseña= $_POST['contraseña'];


$sql=" INSERT INTO cliente  VALUES ('$id','$Matricula','$Correo','$Contraseña')"; // se cambia el nombre de la tabla por la que se utiliza para 
$query=mysqli_query($conexion,$sql);                  // guardar los registros (se cambia clientes por el nombre de la tabla).

?>