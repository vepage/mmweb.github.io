<?php
//Esto hace que se conecte a la base de daots
$datos = array('imagen'=>'', 'idEventoAnterior'=>'','idImagen'=>'');
$accion = 'insert';
include 'uploadI.php';
include 'getEA.php';

?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/designModificaElimina.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <div class="contenedor">
    <div class="row">
  <h1 align="center">Imágenes de eventos Anteriores</h1>
    <form action="postImagen.php" method="post" enctype="multipart/form-data">
        Seleccione la imagen:
        <input type="file" name="imagen" value="<?php echo $datos['imagen']; ?>"/> <br> <br>
        <?php
        $user="root";
        $pass="";
        $server="localhost";
        $db="mmweb";
        $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
        $sql = "SELECT `idEventoAnterior` FROM `eventos_anteriores`;";
        $result = $con->query($sql);
         ?>
      Inserte el ID del evento anterior:  <select name="idEA">	<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
            <option><?php echo $row['idEventoAnterior']; ?></option>
        <?php } ?>
      </select>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="idImagen" value="<?php  echo $datos['idImagen']?>">
        <input type="submit" name="submit" value="Subir"/>
        <a href="menuCliente.php" class="a">Volver</a>
    </form>
<?php
$accion='';
//include 'uploadI.php';
//include 'postImagen.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT `idEventoAnterior` FROM `eventos_anteriores`";
$result = $con->query($sql);
?>

			<div class="contenedorTabla">
				<table class="">
					<thead>
						<tr>
							<th>Eventos Anteriores</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr align="center">
								<td><?php echo $row['idEventoAnterior']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>



<!-- código para la tabla de imágenes-->
<?php
$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT `idImagen`, `imagen`, `idEventoAnterior` FROM `imagenes`";
$result = $con->query($sql);
?>
          <div class="contenedorTabla">

				<table class="tabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>imagen</th>
              <th>idEventoAnterior</th>
						</tr>
					</thead>

					<tbody class="tablab">
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td> <input type="text" name="" value="<?php echo $row['idImagen']; ?>" readonly></td>
								<td> <input type="text" name="" value=" <?php echo $row['imagen']; ?>" readonly></td>
                <td> <input type="text" name="" value="<?php echo $row['idEventoAnterior'] ?>" readonly></td>
								<td><a class="iconsBasura" id="iconsBasura" href="insertaEA.php?accion=eliminar&&idImagen=<?php echo $row['idImagen']; ?>"> <i class="fa fa-trash"></i> </span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
        </div>
			</div>
		</div>
  </body>
  </html>
