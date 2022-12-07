<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>ID Cliente repetido</title>
		<style type="text/css">
			form{
				text-align: center;
				border-radius: 0px;
				border: solid 1px black;
				margin: 0 400 0px 400px;
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
			#clientes form{
				text-align: center;
				border-radius: 20px;
				border: solid 1px black;
				margin: 0 200 100 200px;
			}
			#clientes table,th,td{
				border-radius: 5px;
			}
			#clientes label{
				margin: auto;
			}
		</style>
	</head>
	<body>
		<form action="subirCotizacion.php" method="post" style="white-space:pre-line;" enctype="multipart/form-data">

		<h2>ID del cliente inexistente</h2>

			<a href="subirCotizacion.php"><button type="submit" name="submit" value="Guardar">Aceptar</button></a>
		</form>
	</body>
</html>
