<?php
session_start();
error_reporting(0);
$usuario = $_POST['usuario'];
$pass = $_POST['password'];

$_SESSION['usuario'] = $usuario;
$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
  //echo 'Usted no tiene autorizacion';
  header("location:autorizacion.php");
  die();
}

//Encriptar clave ingresada para posteriormente comparar con la de la base de datos
$EPass = md5($pass);

//conectar a la base de datos
$conexion=mysqli_connect("localhost", "root", "", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");
$consulta="SELECT * FROM datos WHERE usuario='$usuario' and  clave='$EPass'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

$_SESSION['Login']=$filas;

if($filas>0) {
  header("location:notas.php");
}
else{
  echo "
  <script>
    alert('Error en la autentificación');
    window.history.go(-1);
  </script>
  ";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
