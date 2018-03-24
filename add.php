<?php
$link = mysqli_connect("localhost","root","", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");

session_start();

$tituloNota = $_POST['titulo_nota'];
$nota = $_POST['nota'];
$usuario = $_SESSION['usuario'];


$req = (strlen($tituloNota)*strlen($nota)) or die("No se han llenado todos los campos");

$insertar = "INSERT INTO notas (id_usuario,titulo,nota) VALUES ('$usuario','$tituloNota','$nota')";

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
