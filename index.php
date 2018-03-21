<?php
  session_start();
  error_reporting(0);

  $login = $_SESSION['Login'];

  $iSesion = '<a href="login.php">Iniciar Sesión</a>';
  $cSesion = '<a href="loginout.php">Cerrar Sesión</a>';

  if($login>0){
    $icSesion = $cSesion;
  }
  else{
    $icSesion = $iSesion;
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>NotasWeb  | Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:700|Pacifico|Rubik:500" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="contenedor header">
        <div class="logo">
          <a href="index.php"><h2 class="logo">NotasWeb</h2></a>
        </div>
        <div class="navegacion">
          <nav>
            <ul>
              <li><a href="index.php">Inicio</a></li>
              <li><a href="notas.php">Mis Notas</a></li>
              <li><?php echo $icSesion ?></li>
              <li><a href="registrarse.php">Registrarse</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

     <div class="portada">
       <div class="titulo">
        <h2>¡Un sitio web para guardar <br>tus notas!</h2>
       </div>
       <div class="boton">
        <a href="login.php" class="btn-comenzar">Comienzar</a>
       </div>
     </div>

    <footer>
      <div class="contenedor">
        <div class="flex">
          <div class="nosotros">
            <h2 class="logo-footer">NotasWeb</h2>
          </div>

          <div class="redes">
            <div id="botones-sociales">
              <a class="facebook-btn" href="http://www.facebook.com" target="_blank"><img src="img/facebook.png" alt="Facebook logo"/></a>

              <a class="facebook-btn" href="https://twitter.com/?lang=es" target="_blank"><img src="img/twitter.png" alt="Twitter logo"/></a>

              <a class="facebook-btn" href="https://www.instagram.com/" target="_blank"><img src="img/instagram.png" alt="Instagram logo"/></a>
            </div>
          </div>

        </div>
      </div>
      <div class="copyright">
        <p>&copy; Todos los derechos reservados | Francis Design 2018</p>
      </div>
    </footer>

  </body>
</html>
