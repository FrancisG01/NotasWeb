<?php
//Conexion con la base de datos y el servidor
$link = mysqli_connect("localhost","root","", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");

session_start();
error_reporting(0);

//Obtenemos los valores del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];

//Comprobar acceso a archivo
$_SESSION['usuario'] = $usuario;
$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
  //echo 'Usted no tiene autorizacion';
  header("location:autorizacion.php");
  die();
}

//Obtener la longitud de un string
$req = (strlen($usuario)*strlen($correo)*strlen($pass)*strlen($cpass)) or die("No se han llenado todos los campos");

//se confirma la contraseña
if($pass != $cpass){
  die('
  <script>
    alert("Las contraseñas no coinciden");
    window.history.go(-1);
  </script>
  ');
}

//Se encripta la contraseña
$pass = md5($pass);

//Consulta para insertar
$insertar = "INSERT INTO datos (usuario,correo,clave) VALUES ('$usuario','$correo','$pass')";

//Evitar registros Duplicados
$verificar_usuario = mysqli_query($link, "SELECT * FROM datos WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
  echo '
    <script>
      alert("El usuario ya esta registrado");
      window.history.go(-1);
    </script>
  ';
  die();
}
$verificar_correo = mysqli_query($link, "SELECT * FROM datos WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0){
  echo '
    <script>
      alert("El correo ya esta registrado");
      window.history.go(-1);
    </script>
  ';
  die();
}

//Ejecutar consulta
$resultado = mysqli_query($link, $insertar);

if (!$resultado){
   echo "
   <h2>Error de envio</h2>
   ";
}
header('location:gracias.php');

//Cerrar Conexion
mysqli_close($link);
 ?>
