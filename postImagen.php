<?php
  include 'uploadI.php';

  if (isset($_POST['submit'])) {
	if ($_POST['accion']=='insert') {
    $idimagen = $_POST['idImagen'];
		$imagen = $_POST['imagen'];
    $fin = $_POST['idEA'];
		$url = "imagenes/rutas/idImagen";//nombre del archivo con URL
    $ale=random_int( 0, 1000000);
        $ruta= $url.$ale.".jpg";//URL . idCliente . terminacion pdf
		//$ruta = $url.$fin.".jpg";//URL . idCliente . terminacion pdf
		//$nombrefinal=trim($_FILES['cotizacion']['name']);
		//rename($nombrefinal,"Cotizacion".);
		//$nombrefinal= ereg_replace (" ","",$nombrefinal);
		//$upload = $ruta . $nombrefinal;
		$upload = $ruta;
    $pruebas = new PruebaImg($imagen,$fin,$idImagen);
  	$pruebas->insert();
		if(move_uploaded_file($_FILES['imagen']['tmp_name'],$upload)){
			header('location: InfoContacto.php?res=archivocargado');
		}
		if (empty($_POST['imagen'])||empty($_POST['idEventoAnterior'])) {
			header('location: insertaEA.php?res=insercionCorrecta&&archivoCargado');
			echo "Completa los campos";
		}else{

		}

	}

else{
	header("location: insertaEA.php?res=ola");
}
}
 ?>
