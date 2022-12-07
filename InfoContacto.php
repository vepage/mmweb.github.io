
<?php
//Esto hace que se conecte a la base de daots
$datos = array('Nombre'=>'', 'Telefono'=>'','Correo'=>'','idCliente'=>''); //array para la inserción de datos
$accion = 'insert';
include 'D:\XAMPP\htdocs\MMWEB\Registro\FuncionesInfoCon.php';//llamada al doc con la función de insertar en la BD
?>

<!-- inicio de cod html-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>MMWEB</title>
	<script type="text/javascript" src="Funciones.js"></script>
	<link rel="stylesheet" href="imagenes/designIndex.css">
	<link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
	<!--AQUÍ COMIENZA EL INDEX -->
	<div class="hero">
		<nav>
			<h2 class="logo">MM<span>WEB</span></h2>
			<ul>
				<li> <a href="">Inicio</a> </li>
				<li> <a href="#" id="disabled">Evento</a> </li>
				<li> <a href="acercaDe.html">Nosotros</a> </li>
				<li> <a href="inicioSesion.php">Sesion</a> </li>
			</ul>
			<label type="button" name="InfoContacto" class="InfoContacto" for="show">Enviar Información</label>
		</nav>
	</div>
	<!--AQUÍ TERMINA EL INDEX -->

	<body>
		<div class="center">
			<input type="checkbox" id="show">
			<div class="container">
					<label for="show" class="close-btn fas fa-window-close"></label>
					<div class="text">Deja tu Información de contacto</div>
					<form action="postInfoCon.php" method="post"> <!--llamada al doc para insertar desde el formulario-->
							<div class="data">
								<label>Nombre</label>
								<input type="text" value="<?php echo $datos['Nombre']; ?>" name="Nombre" requiered>
							</div>

							<div class="data">
								<label>Teléfono</label>
								<input type="text" value="<?php echo $datos['Telefono']; ?>" name="Telefono" required>
							</div>

							<div class="data">
								<label>Correo</label>
								<input type="text" value="<?php echo $datos['Correo']; ?>" name="Correo">
							</div>

							<div class="btn">
									<div class="inner"></div>
									<input type="hidden" name="accion" value="<?php echo $accion; ?>">
									<button type="submit" name="submit">REGISTRAR</button>
							</div>

				</form><!-- fin del formulario-->
			</div>
		</div>
	</body>


	<!-- Thumbnail images -->
	<div class="slider">
		<?php
		$user="root";
		$pass="";
		$server="localhost";
		$db="mmweb";
		$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());

		if($con){
			$consulta="SELECT idImagen,imagen,idEventoAnterior FROM imagenes";
			$resultado=mysqli_query($con,$consulta);
			if($resultado){
				$contador=0;
						while($row = $resultado->fetch_array()) {
							 $idImg = $row['idImagen'];
							 $img = $row['imagen'];
							 $idEA = $row['idEventoAnterior'];
							 $contador=$contador+1;
							 ?>

							 <figure>
								 <img  src="src="imagenes\rutas<?php echo $row['imagen'];?>">
							 </figure>
							<?php
						 }//fin del while
					 }
		}
		?>

	</div>

</body>
</html>
