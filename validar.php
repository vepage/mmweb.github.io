<?php


  $usuario=$_POST['usuario'];
  $contraseña=$_POST['password'];
  session_start();
  $_SESSION['usuario']=$usuario;

  $conexion=mysqli_connect("localhost","root","","mmweb");
  //$sql = "SELECT `idCliente`, `noTelefono`, `nombre`, `apellido`, `correo`, `clave`, `Tipo` FROM `cliente`";
  //$result = $conexion->query($sql);
  $sql="SELECT `Tipo` FROM `cliente` WHERE noTelefono='$usuario' and clave='$contraseña'";
  $resultado=mysqli_query($conexion,$sql);
  $tipo=mysqli_num_rows($resultado);
  if ($tipo==1){

  $consulta="SELECT * FROM cliente WHERE noTelefono='$usuario' and clave='$contraseña' and Tipo=$tipo";

  $resultado=mysqli_query($conexion,$consulta);

  $filas=mysqli_num_rows($resultado);

  if($filas){
    header("location:menuAdmin.html");
  } else {
    ?>
    <?php
    include("inicioSesion.html");
    ?>
    <h1>ERROR</h1>
    <?php
  }
  mysqli_free_result($resultado);
  mysqli_close($conexion);
}else{header("location: inicioSesion.html?res=error");}
?>
