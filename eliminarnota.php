<?php
$link = mysqli_connect("localhost","root","", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");

session_start();
$id = $_REQUEST['id'];

$insertar = "DELETE FROM notas WHERE id='$id'";

$resultado = mysqli_query($link, $insertar);

if (!$resultado){
   echo "
   <h2>Error de envio</h2>
   ";
}
else {
  header("location:notas.php");
}
mysqli_close($link);
?>
