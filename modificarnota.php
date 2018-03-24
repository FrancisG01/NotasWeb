<?php
  session_start();
  error_reporting(0);
  $conexion = mysqli_connect('localhost','root','','dbusuarios');
  $usuario = $_SESSION['usuario'];
  $login = $_SESSION['Login'];

  $iSesion = '<a href="login.php">Iniciar Sesión</a>';
  $cSesion = '<a href="loginout.php">Cerrar Sesión</a>';

  if($login>0){
    $icSesion = $cSesion;
  }
  else{
    $icSesion = $iSesion;
  }

  if($login <= 0){
    header("location:loginaux.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>NotasWeb | Mis Notas</title>
    <link rel="stylesheet" href="css/addmod-estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:700|Pacifico|Rubik:500" rel="stylesheet">
    <style>
            table td.id{
              display: none;
            }
            table tr td.id{
              display: none;
            }
    </style>
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
       <div class="contenedor">
         <div class="contenedor-login">
           <div class="bienvenida">
              <h2>Modificar Nota</h2>
           </div>

           <?php
                    $id = $_REQUEST['id'];
                    $link = mysqli_connect("localhost","root","", "dbusuarios") or die("<h2>No se encuentra el servidor</h2>");

                    $query = "SELECT * FROM notas WHERE id='$id'";
                    $resultado = mysqli_query($link,$query);
                    $row = mysqli_fetch_assoc($resultado);
                ?>
                <form action="modnota.php?id=<?php echo $row['id']; ?>" method="POST">
                    <input class="campo-titulo" type="text" placeholder="Titulo de la nota" name="titulo_nota" required value="<?php echo $row['titulo']; ?>">
                    <br><br>
                    <textarea name="nota" class="textarea" cols="30" rows="10" placeholder="Escribe aqui tu nota..." required><?php echo $row['nota']; ?></textarea>
                    <br><br>
                    <input class="btn-guardar" type="submit" name="enviar" value="Guardar">
                </form>
         </div>
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
