<?php
  //DECLARAMOS LAS VARIABLES

  $usuario=$_POST['usuario'];
  $contraseña=$_POST['password'];
  $val = 2;

  //SI EL USUARIO PRESIONÓ ENTRAR, ENTONCES LA VARIABLE VAL ES IGUAL A 0
  if(isset($_POST['entrar'])){
    $val = 0;
  }

  //SI EL USUARIO PRESIONÓ ENTRAR COMO ADMINISTRADOR LA VARIABLES SERÁ 1
  if(isset($_POST['entrarAdmin'])){
    $val = 1;
  }

  //INICIAMOS LA SESIÓN, CREAMOS UNA VARIABLE DONDE SE ALMACENARÁ EL USUARIO
  session_start();
  $_SESSION['usuario']=$usuario;

  //AQUÍ ALMACENAMOS LA CONEXIÓN EN UNA VARIABLE CON EL MISMO NOMBRE
  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  //$conexion=mysqli_connect("localhost","root","","mmweb");
 //***********************************************************************************
 //REALIZAMOS LA CONSULTA DONDE VEREMOS QUE LAS CREDENCIALES DE LA BASE
 //DE DATOS SEAN IGUALES A LAS INGRESADAS POR EL USUARIO
 $consulta="SELECT * FROM cliente WHERE noTelefono='$usuario' and clave='$contraseña'";
 //PASAMOS LA CONSULTA A LA VARIABLE RESULTADO
 $resultado=mysqli_query($con,$consulta);
 //OBTENEMOS LAS FILAS
 $filas=mysqli_num_rows($resultado);
 //SI SE ENCUENTRA QUE EL USUARIO Y CONTRASEÑA SE ENCUENTRAN EN LA BASE DE DATOS
 //ENTONCES ENTRA AL SIGUIENTE IF
 if($filas)
 {
   //SI LAS CREDENCIALES SON CORRECTAS, NOS DIRIGIMOS A:
   //HACEMOS LA CONSULTA, INDICANDO QUE QUEREMOS VER EL TIPO DEL CLIENTE QUE SE
   //INSERTARON EN LAS CASILLAS
   $sql="SELECT `Tipo` FROM `cliente` WHERE noTelefono='$usuario' and clave='$contraseña'";

   //PASAMOS EL RESULTADO DE LA CONSULTA A UNA VARIABLE, INDICANDO LA CONSULTA Y
   //VARIABLE CON LA QUE REALIZAMOS LA CONEXIÓN
   //$resultado=mysqli_query($con,$sql);

   //AQUÍ RECUPERAMOS EL VALOR ESPECÍFICO DE LA CONSULTA, QUE ES EL TIPO (1 O 0)
   //1 SI ES ADMIN. 0 SI ES CLIENTE
   //$tipo=mysqli_num_rows($resultado);
   $result = $con->query($sql);
   $row = mysqli_fetch_array($result);
   $max=$row[0];

   //$row['Tipo'];
   //ENTRARÁ EN EL SIGUIENTE IF SOLAMENTE SI SE TRATA DE UN ADMINISTRADOR
   // Y ADEMÁS PRESIONÓ EL BOTÓN DE INGRESAR COMO ADMIN
   if ($max==1 AND $val==1){
     //echo $max;
     header("location:menuAdmin.php");

  }//fin del if anidado
  //SI NO SE CUMPLE LA CONDICIÓN ANTERIOR PERO SE CUMPLE:
  //ENTRÓ EL ADMINISTRADOR Y ADEMÁS PRESIONÓ EL BOTÓN DE INGRESAR (NO COMO ADMIN)
  //LE MOSTRARÁ QUE LAS CREDENCIALES SON INCORRECTAS
  else if($max==1 and $val==0){
    include("inicioSesion.php");
    ?>
      <h3>Credenciales incorrectas</h3>
    <?php
  }
  //SI NO SE CUMPLE LO ANTERIOR PERO:
  //UN CLIENTE COMÚN INTENTA INGRESAR COMO ADMIN:
  else if($max==0 and $val==1){
    include("inicioSesion.html");
    ?>
      <h3>No eres un administrador</h3>
    <?php
  }
  //SI UN CLIENTE INGRESA COMO CLIENTER COMÚN
  else if($max==0 and $val==0){
      header("location:indexClienteSesionIniciada.html");
  }//FIN DEL ÚLTIMO ELSE IF

 } //FIN DEL IF
 else
 {
   //si los datos no coinciden con los de la base de datos, nos regresará a la
   //misma página.
   include("inicioSesion.php");
   ?>
   <h1>No se encuentra registrado</h1>
   <?php
 }
?>
