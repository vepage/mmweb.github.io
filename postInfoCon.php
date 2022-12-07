<?php
include 'D:\XAMPP\htdocs\MMWEB\Registro\FuncionesInfoCon.php';
if (isset($_POST['submit'])) {
	if ($_POST['accion']=='insert') {
		$nom = $_POST['Nombre'];
		$tel = $_POST['Telefono'];
		$correo = $_POST['Correo'];
		if (empty($_POST['Nombre'])||empty($_POST['Telefono'])) {
			header('location:index.php');
			echo "Completa los campos";
		}else{
			$pruebas = new Pruebas($nom,$tel,$correo);
		$pruebas->insert();
		}

	}
}

?>
