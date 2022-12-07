<?php
$accion='entrar';
$datos = array('Nombre'=>'', 'Apellido'=>'', 'Correo_electronico'=>'', 'Id_registros'=>'');
  ?>
<html>
<head>
	<style type="text/css">
	form{
		text-align: center;
		border-radius: 0px;
		border: solid 1px black;
		margin: 0 400 200 400px;
	}
	h1{
		text-align: center;
		background-color: gray;
	}
	label{
		font-size: 20px;
		text-align: justify;
	}
	#volver{
	color: #4D4C4C;
	bottom: 8px;
	right: 2%;
	position: fixed;
}
#volver ul{
	border-radius: 0px;
	background-color: #545454;
}
#volver li a{
	text-decoration: none;
	color: #CDC0C0;
	display: block;
	text-align: center;
	padding: 3 0px;
	padding-right: 40px;
}
#volver li:hover a:hover{
	color: white;
}
	</style>
	<title>Ingresa</title>
</head>
<body>
<h1>Ingresa</h1>
<form method="post" action="post.php" style="white-space:pre-line;">
<label>Escribe tu correo electronico:</label>

<input type="text" value="<?php echo $datos['Correo_electronico']; ?>" name="Correo_electronico"requiered>
<input type="hidden" name="accion" value="<?php echo $accion; ?>">
<input type="submit" name="submit" value="Entrar">
</form>
<div id="volver">
<ul >
<li><a href="C:\xampp\htdocs\michoacan\pagina principal 1.html">Volver</a></li>
</ul>
</div>
</body>
</html>