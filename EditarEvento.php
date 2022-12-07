<?php
$accion='';

include 'funcionesCotizacion.php';
include 'getCot.php';

if (isset($_GET['Guardar'])) {
  $idCotizacion=$_GET['idCotizacion'];
  $Tipo=$_GET['Tipo'];
  $Ubicacion=$_GET['Ubicacion'];
  $Fecha=$_GET['NFecha'];
  $idEvento=$_GET['idEvento'];
  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  $sql = "UPDATE `evento` SET `tipo`='$Tipo',`fecha`='$Fecha',`ubicacion`='$Ubicacion' where idEvento = '$idEvento' ";
  $result = $con->query($sql);
  header("location: EditarEvento.php?res=Actualizado");

}else{
  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  $sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido,e.tipo,e.fecha,e.ubicacion,e.idEvento FROM cotizacion c
          inner join cliente cl on cl.idCliente = c.idCliente
          inner join evento e on c.idCotizacion = e.idCotizacion";
  $result = $con->query($sql);

}
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>MMWEB</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="imagenes/designModificaElimina.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>

		<div class="contenedor">
			                               <script type="text/javascript">
				function confirmarActualizar() {
					var respuesta = confirm("¿Desea actualizar este evento?");
					if(respuesta == true){
						return true;
					}else{
						return false;
					}
				}
			</script>
			<div class="contenedorTabla">
        <div class="row">
          <div class="busqueda">
          <a href="menuAdmin.php" class="a">Volver</a>
          </div>
          <table class="tabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cotizacion</th>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Nueva Fecha</th>
                <th>Ubicación</th>
              </tr>
            </thead>
            <tbody class="tablab">
              <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>

                  <form action="EditarEvento.php" method="get" enctype="multipart/form-data">
                    <td><input type="text" name="idCotizacion" value="<?php echo $row['idCotizacion']; ?>" readonly></input></td>
                    <td><input type="text" value="<?php echo $row['cotizacion']; ?>" name="cotizacion" readonly></input></td>
                    <td><input type="text" name="idCliente" value="<?php echo $row['idCliente']; ?>" readonly></input></td>
                    <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?>" readonly></input></td>
                    <td><input type="text" name="Tipo" value="<?php echo $row['tipo']; ?>" required></input></td>
                    <td><input type="text" name="Fecha" value="<?php echo $row['fecha']; ?>" required readonly></input></td>
                    <td><input type="datetime-local" name="NFecha" value="" required></input></td>
                    <td><input type="text" name="Ubicacion" value="<?php echo $row['ubicacion']; ?>" required></input></td>
                    <td><input type="hidden" name="idEvento" value="<?php echo $row['idEvento']; ?>" required></input></td>
                    <td><input type="submit" name="Guardar" value="Guardar" onclick="return confirmarActualizar()"></input></td>
                  </form>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        </div>
		</div>


	</body>
</html>
