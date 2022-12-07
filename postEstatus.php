<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
<script type="text/javascript">
function Repetido() {
	window.alert("Repetido.");
}
</script>
	<body>
		<?php
		include 'funcionesEstatus.php';
		include 'getEstatus.php';

		if (isset($_POST['submit'])) {
			if ($_POST['accion']=='insert') {
		    $idCot = $_POST['idEstatus'];
				$cot = $_POST['EstatusCliente'];
				$idCl = $_POST['idCliente'];
				$url = "Estatus/Estatus";//nombre del archivo con URL
				$ruta= $url.$idCl.".pdf";//URL . idCliente . terminacion pdf
				//$nombrefinal=trim($_FILES['cotizacion']['name']);
				//rename($nombrefinal,"Cotizacion".);
				//$nombrefinal= ereg_replace (" ","",$nombrefinal);
				//$upload = $ruta . $nombrefinal;
				$upload = $ruta;
				$user="root";
		    $pass="";
		    $server="localhost";
		    $db="mmweb";
		    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
				//id cliente de cotizacion
				$id="SELECT `idCliente` FROM `estatus` WHERE `idCliente` = $idCl";
				$result = $con->query($id);
				//id cliente de clientes
				$cliente="SELECT `idCliente` FROM `cliente` WHERE `idCliente` = $idCl";
				$resultC = $con->query($cliente);
				//row de id cliente de cotizacion
				$row = $result->fetch_array(MYSQLI_ASSOC);
				//row de id cliente de clientes
				$row2= $resultC->fetch_array(MYSQLI_ASSOC);

				if($row["idCliente"]==$idCl){
					header('location: FKCotRep.php?res=FKRepetida');
				}else if($row2["idCliente"]==$idCl){
					if (empty($_POST['idCliente'])) {
						//header('location: cotizaciones.php?res=incompleto');
						echo "Completa los campos";
					}else if($_FILES['EstatusCliente']['type']!='application/pdf'){
						header('location: noPDFE.php?res=Invalid');
					}
					else{
						$pruebas = new Pruebas($cot, $idCl,$idCot);
				  	$pruebas->insert();
							if(move_uploaded_file($_FILES['EstatusCliente']['tmp_name'],$upload)){
								//header('location: cotizaciones.php?res=archivocargado');
							}

						//header('location: cotizaciones.php?res=InsercionCorrecta');
					}
				}else{
					header('location: CotClInex.php?res=ClienteInexistente');
				}


			}else if ($_POST['accion']=='update') {
				$idCot = $_POST['idEstatus'];
				$cot = $_POST['EstatusCliente'];
				$idCl = $_POST['idCliente'];
				$url = "Estatus/Estatus";//nombre del archivo con URL
				$ruta= $url.$idCl.".pdf";//URL . idCliente . terminacion pdf
				//$nombrefinal=trim($_FILES['cotizacion']['name']);
				//rename($nombrefinal,"Cotizacion".);
				//$nombrefinal= ereg_replace (" ","",$nombrefinal);
				//$upload = $ruta . $nombrefinal;
				$upload = $ruta;
				$user="root";
		    $pass="";
		    $server="localhost";
		    $db="mmweb";
		    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
				$id="SELECT `idCliente` FROM `estatus` WHERE `idCliente` = $idCl";
				$result = $con->query($id);
				$cliente="SELECT `idCliente` FROM `cliente` WHERE `idCliente` = $idCl";
				$resultC = $con->query($cliente);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$row2= $resultC->fetch_array(MYSQLI_ASSOC);

				if($row2["idCliente"]==$idCl){
					if (empty($_POST['idCliente'])) {
						//header('location: cotizaciones.php?res=incompleto');
						echo "Completa los campos";
					}else if($_FILES['Estatus']['type']!='application/pdf'){
						header('location: noPDFE.php?res=Invalid');
					}
					else{
						$pruebas = new Pruebas($cot, $idCl,$idCot);
				  	$pruebas->update();

							if(is_uploaded_file($_FILES['Estatus']['tmp_name'])){
								//header('location: cotizaciones.php?res=archivocargado');
								//array_map('unlink', glob("$ruta"));
								copy($_FILES['Estatus']['tmp_name'],$upload);
							}

						//header('location: cotizaciones.php?res=InsercionCorrecta');
					}
				}else{
					header('location: CotClInex.php?res=ClienteInexistente');
				}
			}else if ($_POST['accion']=='buscar') {
				$idCl = $_POST['idCliente'];
				$idCot = '';
				$cot = '';
				if (empty($_POST['idCliente'])) {
					header('location:MEstatus.php?res=Vacio');
					echo "Completa los campos";
				}else{
					$pruebas = new Pruebas($idCot, $cot, $idCl);
					$pruebas->select();
				}

			}else if ($_POST['accion']=='entrar') {
				$correo = $_POST['Correo_electronico'];
				$nom = '';
				$apell = '';
				if (empty($_POST['Correo_electronico'])) {
					header('location:http://localhost/mmweb/Registro/entrar.php?res=error');
				}
				$pruebas = new Pruebas($nom, $apell, $correo);
				$pruebas->entrar();
		}
		else{
			header("location: recibos.php?res=ola");
		}
		}
		?>
	</body>
</html>
