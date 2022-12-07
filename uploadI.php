<?php
/*if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
class PruebaImg{
  protected $idImagen;
  protected $imagen;
  protected $fin;

  public function __construct($imagen,$fin,$idImagen=''){
     $user="root";
     $pass="";
     $server="localhost";
     $db="mmweb";
     $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());

     $this->idImagen= $con->real_escape_string($idImagen);
     $this->imagen= $con->real_escape_string($imagen);
     $this->fin = $con->real_escape_string($fin);

  }//cs

 public function insert(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());

   $sql="INSERT INTO `imagenes`(`imagen`, `idEventoAnterior`) VALUES ('$this->imagen.jpg','$this->fin')";
   $con->query($sql) ? header("location: insertaEA.php?res=insertado") : header("location: insertaEA.php?res=error");
 }//insert

 static function ningunDato(){
    return new self('', '', '');
  }
  static function soloId($fin,$idImagen){
    return new self('',$fin,$idImagen);
  }


}


?>
