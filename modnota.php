<?php
$link = mysqli_connect("localhost","root","", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");

session_start();
$id = $_REQUEST['id'];
$tituloNota = $_POST['titulo_nota'];
$nota = $_POST['nota'];


$req = (strlen($tituloNota)*strlen($nota)) or die("No se han llenado todos los campos");

$insertar = "UPDATE notas SET titulo='$tituloNota', nota='$nota' WHERE id='$id'";

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
