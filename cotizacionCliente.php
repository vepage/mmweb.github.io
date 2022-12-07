<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="imagenes/designIndex.css?">
    <title></title>
  </head>
  <body>

    <div class="hero">
      <nav>
        <h2 class="logo">MM<span>WEB</span></h2>
        <ul>
          <li> <a href="indexClienteSesionIniciada.html">Inicio</a> </li>
          <li> <a href="cotizacionCliente.php">Evento</a> </li>
          <li> <a href="acercaDeSI.html">Nosotros</a> </li>
          <li> <a href="inicioSesion.php">Sesion</a> </li>
        </ul>
      </nav>

        <div class="completo glass">

    <?php

      $datos = array('textSugerencia'=>'', 'idEvento'=>'','idCliente'=>''); //array para la inserción de datos
      //$accion = 'insert';

      //$usuario = 3111234567;
      session_start();
      $usuario = $_SESSION['usuario'];



      $user="root";
      $pass="";
      $server="localhost";
      $db="mmweb";
      $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
      if($con) {
        $consulta = "SELECT cl.idCliente, cl.nombre, cl.apellido, cl.noTelefono, co.cotizacion,e.idEvento
                      FROM cotizacion co
                      INNER JOIN cliente cl
                      ON co.idCliente = cl.idCliente
                      INNER JOIN evento e
                      ON e.idCotizacion = co.idCotizacion
                      WHERE cl.noTelefono = '$usuario'";
        $resultado=mysqli_query($con,$consulta);

        if($resultado){
            while($row = $resultado->fetch_array()) {
               $nombre = $row['nombre'];
               $apellido = $row['apellido'];
               $telefono = $row['noTelefono'];
               $cotizacion = $row['cotizacion'];
               $idCliente = $row['idCliente'];
               $idEvento = $row['idEvento'];
               $datos['idEvento'] = $idEvento;
               $datos['idCliente'] = $idCliente;
               if(isset($_GET['insertar'])) {
                 //$idEvento=$_GET['idEvento'];
                 //$idCliente=$_GET['idCliente'];
                 $descri=$_GET['textSugerencia'];
                 //$estado=$_GET['Estado'];
                 $user="root";
                 $pass="";
                 $server="localhost";
                 $db="mmweb";
                 $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
                 $consulta = "INSERT INTO `sugerencias`(`idEvento`,`descripcion`,`estado`,`idCliente`) values ($idEvento,'$descri','Sin destacar',$idCliente)";
                 $result = $con->query($consulta);
               }
               ?>

               <div class="datos">
                 <h1>¡Hola de nuevo!</h1>
                  <h2><?php echo $nombre," ",$apellido; ?></h2>
                  Teléfono: <?php echo $telefono; ?>

                  <div class="botonesA">
                    <a href="documentos/Cotizacion<?php echo $row['idCliente'];?>.pdf" target="_blank">
                      <input type="button" name="consultaCotizacion" value="VISUALIZAR COTIZACIÓN" class="op">
                    </a>

                    <a href="Estatus/Estatus<?php echo $row['idCliente'];?>.pdf" target="_blank">
                      <input type="button" name="consultaCotizacion" value="VISUALIZAR ESTATUS" class="op"></input>
                    </a>

                    <a href="Recibos/Recibo<?php echo $row['idCliente'];?>.pdf" target="_blank">
                      <input type="button" name="consultaCotizacion" value="VISUALIZAR RECIBO" class="op">
                    </a>
                  </div>

                  <form class="" action="cotizacionCliente.php" method=""enctype="multipart/form-data">
                    <h3>INSERTA SUGERENCIA</h3>
                    <br>
                    <textarea name="textSugerencia" rows="3" cols="80" value="<?php echo $datos['textSugerencia']; ?>" required></textarea>
                    <input type="text" name="idEvento" value="<?php echo $datos['idEvento']; ?>" disabled hidden>
                    <input type="text" name="idCliente" value="<?php echo $datos['idCliente']; ?>" disabled hidden>
                    <br>
                    <button type="submit" name="insertar" value="Insertar" class="insertS">Insertar</button>
                  </form>

               </div>

              <?php

             }//fin del while

           }

        }
    ?>
        </div>

    </div>



</body>
</html>
