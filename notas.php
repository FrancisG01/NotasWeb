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
    <!--<link rel="stylesheet" href="css/notas-estilos.css">-->
    <link href="https://fonts.googleapis.com/css?family=Cabin:700|Pacifico|Rubik:500" rel="stylesheet">
    <style>
            table td.id{
              display: none;
            }
            table tr td.id{
              display: none;
            }
        *{
  margin: 0;
  padding: 0;
}
div.contenedor{
  max-width: 1100px;
  margin: 0 auto;
}
header{
  width: 100%;
  background-color: #ff5722;
}
.header{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.header::after{
  display: block;
  clear: both;
  content: '';
}
div.logo{
  width: 30%;
  float: left;
  padding: 10px;
}
div.logo a{
  text-decoration: none;
  display: inline-block;
}
div.logo h2.logo{
  font-family: 'Pacifico', cursive;
  font-size: 50px;
  color: white;
}
div.navegacion{
  float: right;
}
div.navegacion nav ul{
  list-style: none;
}
div.navegacion nav ul li{
  float: left;
  padding: 15px;
}
div.navegacion nav ul li a{
  text-decoration: none;
  font-size: 20px;
  color: white;
  font-family: 'Rubik', sans-serif;
}
div.navegacion nav ul li a:hover{
  color: #1d1917;
}*/

/*-- NAV --*/
/* -- Login --*/
div.portada{
  width: 100%;
  height: 100vh;
  background-color: #dcdcdc;
  padding: 2% 0;
}
div.portada{
 width: 100%;
 height: 80vh;
 background-color: #dcdcdc;
 padding: 5% 0;
}
div.portada div.contenedor{
 background-color: white;
 width: 90%;
 max-width: 1100px;
 margin: 0 auto;
 border-radius: 2%;
 box-shadow: 0px 0px 10px #888888;
}
div.portada div.contenedor div.contenedor-login{
    width: 100%;
    height: 100%;
    padding: 5% 5%;
    text-align: center;
    box-sizing: border-box;
}
div.portada div.contenedor div.contenedor-login div.bienvenida{
    padding: 0% 0 2% 0;
}
div.portada div.contenedor div.contenedor-login div.bienvenida h2{
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    margin-bottom: 15px;
}
div.portada div.contenedor div.contenedor-login div.bienvenida h3{
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    color: #46413f;
}
div.portada div.contenedor div.contenedor-login div.bienvenida a{
    text-decoration: none;
    padding: 10px 20px;
    background-color: #ff5722;
    color: white;
    font-family: 'Rubik', sans-serif;
}
div.portada div.tabla{
    margin: 0 auto;
    box-sizing: border-box;
    display: inline-block;
    width: 100%;
}
/*div.contenedor-login p a{
  color: #ff5722;
  text-decoration: none;
}*/
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 10px 0;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #1d1917;
    color: white;
}
#customers td{
  text-align: left;
}
#customers td.botones{
    text-align: center;
}
#customers td.titulo_nota{
    padding-left: 2%;
}
#customers td.titulo_nota a{
    text-decoration: none;
    color: #46413f;
    font-family: 'Rubik', sans-serif;
}
#customers td.titulo_nota a:hover{
       color: #ff5722;     
 }
#customers td.botones a{
  padding: 5px 20px;
  font-family: 'Rubik', sans-serif;
  background-color: #ff5722;
  color: white;
  margin: 0 10px;
    text-decoration: none;
}
#customers td.botones a:hover{
  background-color: #1d1917;
  cursor: pointer;
}
#customers th.notas{
  width: 70%;
}
#customers th.accion{
  width: 30%;
}


div.contenedor-login a.btn-addNota{
  color: white;
  text-decoration: none;
  font-size: 50px;
  background-color: #ff5722;
  font-weight: bold;
  padding: 7px 15px;
  border-radius: 50%;
  position: fixed;
  bottom: 1%;
  right: 1%;
  border: 0;
    font-family: 'Rubik', sans-serif;
}
div.contenedor-login a.btn-addNota:hover{
  background-color: #1d1917;
  cursor: pointer;
}

/*---------------Footer---------*/

footer{
  width: 100%;
  background-color: #1d1917;
  padding: 30px 0;
  border-top: 5px solid #ff5722;
}
footer div.nosotros h2.logo-footer{
  font-family: 'Pacifico', cursive;
  font-size: 30px;
  color: #d2d2d2;
  display: block;
}
footer div.flex{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
footer div.nosotros,
footer div.redes{
  width: 30%;
}
footer div.copyright{
  margin-bottom: -30px;
  text-align: center;
  padding: 10px 0;
  color: #d2d2d2;
  background-color: rgba(0, 0, 0, .3);
  margin-top: 20px;
  font-family: 'Rubik', sans-serif;
  font-size: 12px;
}
div.redes img{
  height: 30px;
  margin: 0 20px;
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
              <h2>Bienvenido: <?php echo $usuario ?></h2>
              <h3>Haga Click en el Botón "+", Para Crear una Nueva Nota</h3>
           </div>

           <div class="tabla">
               <table id="customers">
                    <tr>
                      <td class="id">ID</td>
                      <th class="notas">Mis Notas - Nombre</th>
                      <th class="accion" colspan="2">Acción</th>
                    </tr>
                    <?php

                        $query = "SELECT * FROM notas WHERE id_usuario = '$usuario'";
                        $resultado = mysqli_query($conexion,$query);
                        while($row = mysqli_fetch_assoc($resultado)){
                        ?>

                        <tr class="datos">
                            <td class="id"><?php echo $row['id']; ?></td>
                            <td class="titulo_nota"><a href="modificarnota.php?id=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a></td>
                            <td class="botones"><a href="modificarnota.php?id=<?php echo $row['id']; ?>" class="btneditar">Modificar</a></td>
                            <td class="botones"><a href="eliminarnota.php?id=<?php echo $row['id']; ?>" class="btneliminar">Eliminar</a></td>
                        </tr>

                    <?php } 
                   mysqli_close($conexion);
                   ?>
                </table>
          </div>
           

           <a href="addnota.php" class="btn-addNota">+</a>

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
