<?php
include 'D:\XAMPP\htdocs\MMWEB\Registro\funciones.php';
if (isset($_POST['submit'])) {
	if ($_POST['accion']=='insert') {
		$nom = $_POST['Nombre'];
		$apell = $_POST['Apellido'];
		$tel = $_POST['Telefono'];
		$clave = $_POST['Clave'];
		$correo = $_POST['Correo_electronico'];
		$user="root";
		$pass="";
		$server="localhost";
		$db="mmweb";
		$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
		if (empty($_POST['Telefono'])) {
			header('location:ClientesVacio.php');
			echo "Completa los campos";
		}else if (empty($_POST['Correo_electronico'])) {
			header('location:ClientesVacio.php');
			echo "Completa los campos";
		}else if (empty($_POST['Nombre'])) {
			header('location:ClientesVacio.php');
			echo "Completa los campos";
		}else if (empty($_POST['Clave'])) {
			header('location:ClientesVacio.php');
			echo "Completa los campos";
		}else{
			$sql = "SELECT `noTelefono` FROM `cliente` WHERE `noTelefono`=$tel";
			$result = $con->query($sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if($row["noTelefono"]==$tel){
				header('location:ClientesDuplicado.php');
				echo "Este número está registrado.";
			}else {
				$pruebas = new Pruebas($nom, $apell, $correo,$tel,$clave);
			$pruebas->insert();
			}

		}

	}
	else if ($_POST['accion']=='update') {
		$nom = $_POST['Nombre'];
		$apell = $_POST['Apellido'];
		$tel = $_POST['Telefono'];
		$clave = $_POST['Clave'];
		$correo = $_POST['Correo_electronico'];
		$idCliente = $_POST['Id_Cliente'];
		$Tipo = $_POST['Tipo'];
		if (empty($_POST['Telefono'])||empty($_POST['Correo_electronico'])||empty($_POST['Nombre'])||empty($_POST['Clave'])||empty($_POST['Telefono'])) {
			header('location:Clientes.php?res=Vacio');
			echo "Completa los campos";
		}else{
			try {
				$pruebas = new Pruebas($nom, $apell, $correo,$tel,$clave,$idCliente,$Tipo);
				$pruebas->update();
					} catch (Exception $e) {
    				header('location:Clientes.php?res=Duplicado');
						}
		}

	}else if ($_POST['accion']=='buscar') {
		$nom = $_POST['Nombre'];
		$apell = '';
		$tel = '';
		$clave = '';
		$correo = '';
		$idCliente = '';
		$Tipo = '';
		if (empty($_POST['Nombre'])) {
			header('location:Clientes.php?res=Vacio');
			echo "Completa los campos";
		}else{
			$pruebas = new Pruebas($nom, $apell, $correo,$tel,$clave,$idCliente,$Tipo);
			$pruebas->select();
		}

	}
	else if ($_POST['accion']=='entrar') {
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
	header("location:http://localhost/mmweb/Registro/?res=error");
}
}
?>
